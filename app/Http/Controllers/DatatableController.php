<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Fotograma;
use App\Models\InfoGeneral;

class DatatableController extends Controller
{
    public function archivos()
    {
        $archivos = Archivo::select('id', 'clave', 'titulo_original', 'genero', 'created_at', 'updated_at')->get();

        return datatables()
            ->collection($archivos->map(function ($archivo) {
                return [
                    'id' => $archivo->id,
                    'clave' => $archivo->clave,
                    'titulo_original' => $archivo->titulo_original,
                    'genero' => $archivo->genero,
                    'created_at' => $archivo->created_at->diffForHumans(),
                    'updated_at' => $archivo->updated_at->diffForHumans(),
                ];
            }))
            ->addColumn('ver', '<a href="{{ route("archivos.show", $id) }}" class="badge bg-warning"><img src="{{ asset("/img/plus-circle.svg") }}"/></a>')
            ->addColumn('editar', '<a href="{{ route("archivos.edit", $id) }}" class="badge bg-info"><img src="{{ asset("/img/pencil-square.svg") }}"/></a>')
            ->addColumn('eliminar',
                '<form action="{{ route("archivos.destroy", $id) }}" method="POST">
                @csrf
                @method(\'DELETE\')
                <button type="submit" class="badge bg-danger" id="del">
                <img src="{{ asset("/img/trash.svg") }}"/>
                </button>
                </form>'
            )
            ->rawColumns(['ver', 'editar', 'eliminar'])
            ->toJson();
    }

    public function showTitulos()
    {
        $archivos = Archivo::select(
            'archivos.id',
            'archivos.clave',
            'archivos.titulo_original',
            'ficha_tecnica.sinopsis'
            )
            ->join(
                'ficha_tecnica',
                function ($join) {
                    $join->on('archivos.id', '=', 'ficha_tecnica.id');
                }
            )->get();

        return response()->json([
            "data" => $archivos
        ]);
    }

    public function showIndiceTematico()
    {
        $indices = InfoGeneral::select('indice_tematico')
            ->orderBy('id')
            ->distinct('indice_tematico')
            ->pluck('indice_tematico');

        $data = Archivo::select(
            'archivos.id',
            'archivos.clave',
            'archivos.titulo_original',
            'ficha_tecnica.sinopsis',
            'info_general.indice_tematico'
            )
            ->join('ficha_tecnica', function ($join) {
                $join->on('archivos.id', '=', 'ficha_tecnica.id');
            })
            ->join('info_general', function ($join) {
                $join->on('archivos.id', '=', 'info_general.id');
            })
            ->orderBy('archivos.id')
            ->get();

        foreach($data as $dat){
            $fotogramas = Fotograma::select('*')
            ->where('id', $dat->id)
            ->orderBy('numFoto')
            ->get();

            $dat->offsetSet('fotogramas', $fotogramas);
        }


        return response()->json([
            "data" => $data,
            "indices" => $indices
        ]);
    }
}
