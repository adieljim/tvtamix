<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArchivoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo_original' => ['required'],
            'genero' => ['required'],
            'duracion'  => ['required'],
            'tipo_archivo' => ['required'],
            'formato_original' => ['required'],
            'codec_ac' => ['required'],
            'codec_bc' => ['required'],
            'huella_digital_video_ac' => ['required'],
            'huella_digital_video_bc' => ['required'],
            //'fotogramas' => '',
            'fecha_digitalizacion'  => ['required'],

            'lengua' => ['required'],
            'indice_tematico' => ['required'],
            'descripcion_general' => ['required'],
            'personajes_principales' => ['required'],
            'categoria_consulta' => ['required'],

            'realizacion' => ['required'],
            'camarografo' => ['required'],
            'asistente_camara' => ['required'],
            'sonidista' => ['required'],
            'investigacion' => ['required'],
            'edicion' => ['required'],
            'posproduccion' => ['required'],
            'produccion_ejecutiva' => ['required'],
            'lugar_produccion' => ['required'],
            'anio_produccion' => ['required'],
            'localidad' => ['required'],
            'sinopsis' => ['required']
        ];
    }
}
