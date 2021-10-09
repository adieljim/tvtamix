<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitante;

class VisitanteController extends Controller
{
    public function visitante(Request $request){
        Visitante::create([
            'nombre' => $request->name,
            'apellidos' => $request->apellidos
        ]);

        $visitante = ['name'=> $request->name, 'apellidos' => $request->apellidos];

        return view('visitante', compact('visitante'));
    }
}
