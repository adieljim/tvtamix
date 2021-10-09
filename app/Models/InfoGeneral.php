<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoGeneral extends Model
{
    use HasFactory;
    protected $table = 'info_general';

    protected $fillable = [
        'id',
        'lengua',
        'indice_tematico',
        'descripcion_general',
        'personajes_principales',
        'categoria_consulta'
    ];
}
