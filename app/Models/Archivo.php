<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'clave',
        'titulo_original',
        'genero',
        'duracion',
        'tipo_archivo',
        'formato_original',
        'codec_ac',
        'codec_bc',
        'huella_digital_video_ac',
        'huella_digital_video_bc',
        'fecha_digitalizacion',
        'fotogramas'
    ];

}
