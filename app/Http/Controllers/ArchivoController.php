<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArchivoRequest;
use App\Http\Requests\UpdateArchivoRequest;
use App\Models\Archivo;
use App\Models\FichaTecnica;
use App\Models\Fotograma;
use App\Models\InfoGeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos = Archivo::paginate(10);

        return view('archivos.index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_archivo = DB::select('select tipo from tipo_archivo');

        $formato_archivo = DB::select('select * from formato_archivo');

        $json = File::get('storage/datos.json');
        $datos = json_decode($json);

        $formato = [
            'archivo' => $tipo_archivo,
            'formato_archivo' => $formato_archivo,
            'datos' => $datos,
        ];

        return view('archivos.create', compact('formato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArchivoRequest $request)
    {

        $archivo = Archivo::create([
            'titulo_original' => $request->titulo_original,
            'clave' => $request->clave,
            'genero' => $request->genero,
            'duracion' => $request->duracion,
            'tipo_archivo' => $request->tipo_archivo,
            'formato_original' => $request->formato_original,
            'codec_ac' => $request->codec_ac,
            'codec_bc' => $request->codec_bc,
            'huella_digital_video_ac' => $request->huella_digital_video_ac,
            'huella_digital_video_bc' => $request->huella_digital_video_bc,
            'fecha_digitalizacion' => $request->fecha_digitalizacion,
        ]);

        $id_archivo = $archivo->id;

        /***
         * guardar imagenes
         */
        $count = 0;
        foreach ($request->file('fotogramas') as $file) {
            $count++;
            /**
             * Nombre del fotograma, con el prefijo fotograma_ y la hora de guardado.
             */
            $filename = uniqid() . $file->getClientOriginalName();

            $file->storeAs('public/fotogramas', $filename);

            Fotograma::create([
                'nombre' => $filename,
                'id' => $id_archivo,
                'numFoto' => $count,
            ]);

        }

        /**
         * guardar la ficha tecnina
         */

        FichaTecnica::create([
            'id' => $id_archivo,
            'realizacion' => $request->realizacion,
            'camarografo' => $request->camarografo,
            'asistente_camara' => $request->asistente_camara,
            'sonidista' => $request->sonidista,
            'investigacion' => $request->investigacion,
            'edicion' => $request->edicion,
            'posproduccion' => $request->posproduccion,
            'produccion_ejecutiva' => $request->produccion_ejecutiva,
            'lugar_produccion' => $request->lugar_produccion,
            'anio_produccion' => $request->anio_produccion,
            'entidad_federativa' => $request->entidad_federativa,
            'sinopsis' => $request->sinopsis,
        ]);

        InfoGeneral::create([
            'id' => $id_archivo,
            'lengua' => $request->lengua,
            'indice_tematico' => $request->indice_tematico,
            'descripcion_general' => $request->descripcion_general,
            'personajes_principales' => $request->personajes_principales,
            'categoria_consulta' => $request->categoria_consulta,

        ]);

        $mensaje = "Archivo guardado satisfactoriamente.";
        $tipo = "alert-success";
        return redirect()->route('archivos.index')
            ->with("mensaje", $mensaje)
            ->with("tipo", $tipo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        $ficha = FichaTecnica::find($archivo->id);
        $info = InfoGeneral::find($archivo->id);
        $data = [
            'ficha' => $ficha,
            'info' => $info,
            'archivo' => $archivo,
        ];
        return view('archivos.show', compact('data'));}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        $tipo_archivo = DB::select('select tipo from tipo_archivo');

        $formato_archivo = DB::select('select * from formato_archivo');

        $ficha = FichaTecnica::find($archivo->id);
        $info = InfoGeneral::find($archivo->id);

        $json = File::get('storage/datos.json');
        $datos = json_decode($json);

        $data = [
            'ficha' => $ficha,
            'info' => $info,
            'archivo' => $archivo,
            'tipo' => $tipo_archivo,
            'formato' => $formato_archivo,
            'datos' => $datos,
        ];
        return view('archivos.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArchivoRequest $request, Archivo $archivo)
    {
        $id = $archivo->id;

        $file = $request->file('fotogramas');

        /*
         ** Validacion que indica si se subio un nuevo fotograma,
         ** se borra el archivo anterior, y luego se guarda el nuevo.
         */
        if ($file != null) {
            Storage::delete($archivo->fotogramas);
            Fotograma::destroy($id);
            /***
             * guardar imagenes
             */
            $count = 0;
            foreach ($request->file('fotogramas') as $file) {
                $count++;
                /**
                 * Nombre del fotograma, con el prefijo fotograma_ y la hora de guardado.
                 */
                $filename = uniqid() . $file->getClientOriginalName();

                $file->storeAs('public/fotogramas', $filename);

                Fotograma::create([
                    'nombre' => $filename,
                    'id' => $id,
                    'numFoto' => $count,
                ]);

            }
        }

        $archivo->update([
            'titulo_original' => $request->titulo_original,
            'genero' => $request->genero,
            'duracion' => $request->duracion,
            'tipo_archivo' => $request->tipo_archivo,
            'formato_original' => $request->formato_original,
            'codec_ac' => $request->codec_ac,
            'codec_bc' => $request->codec_bc,
            'huella_digital_video_ac' => $request->huella_digital_video_ac,
            'huella_digital_video_bc' => $request->huella_digital_video_bc,
            'fecha_digitalizacion' => $request->fecha_digitalizacion,
        ]);
        $archivo->save();

        $ficha = FichaTecnica::find($id);

        $ficha->update([
            'id' => $id,
            'realizacion' => $request->realizacion,
            'camarografo' => $request->camarografo,
            'asistente_camara' => $request->asistente_camara,
            'sonidista' => $request->sonidista,
            'investigacion' => $request->investigacion,
            'edicion' => $request->edicion,
            'posproduccion' => $request->posproduccion,
            'produccion_ejecutiva' => $request->produccion_ejecutiva,
            'lugar_produccion' => $request->lugar_produccion,
            'anio_produccion' => $request->anio_produccion,
            'entidad_federativa' => $request->entidad_federativa,
            'sinopsis' => $request->sinopsis,
        ]);

        $info = InfoGeneral::find($id);

        $info->update([
            'id' => $id,
            'lengua' => $request->lengua,
            'indice_tematico' => $request->indice_tematico,
            'descripcion_general' => $request->descripcion_general,
            'personajes_principales' => $request->personajes_principales,
            'categoria_consulta' => $request->categoria_consulta,

        ]);

        $mensaje = "Archivo actualizado satisfactoriamente.";
        $tipo = "alert-info";
        return redirect()->route('archivos.index')
            ->with("mensaje", $mensaje)
            ->with("tipo", $tipo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {

        FichaTecnica::destroy($archivo->id);
        InfoGeneral::destroy($archivo->id);

        /*
         ** Elimina el archivo asociado al archivo
         */
        $fotogramas = Fotograma::select('nombre')->where('id',$archivo->id);
        Fotograma::destroy($archivo->id);

        foreach ($fotogramas as $foto){
            var_dump($foto);
            Storage::delete('public/fotogramas/'.$foto->nombre);
        }


        Archivo::destroy($archivo->id);

        $mensaje = "Archivo eliminado satisfactoriamente.";
        $tipo = "alert-danger";
        return redirect()->back()
            ->with("mensaje", $mensaje)
            ->with("tipo", $tipo);
    }
}
