<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotograma extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'numFoto',
        'nombre'
    ];
}
