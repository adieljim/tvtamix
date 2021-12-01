<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaTecnica extends Model
{
    use HasFactory;
    
    protected $table = 'ficha_tecnica';

    protected $fillable = [
        'id',
        'realizacion',
        'camarografo',
        'asistente_camara',
        'sonidista',
        'investigacion',
        'edicion',
        'posproduccion',
        'produccion_ejecutiva',
        'lugar_produccion',
        'anio_produccion',
        'localidad',
        'sinopsis',
    ];
}
