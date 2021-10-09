<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Models\FichaTecnica;
use App\Models\InfoGeneral;
use Barryvdh\DomPDF\PDF;

class GeneraPDFController extends Controller
{
    public function showPDF($id){
        $archivo = Archivo::find($id);
        $ficha = FichaTecnica::find($id);
        $info = InfoGeneral::find($id);
        $data = [
            'ficha' => $ficha,
            'info' => $info,
            'archivo' => $archivo
        ];

        $pdf = PDF::loadView('archivos.showDocument', ['data' => $data]);
        return $pdf->stream();
    }
}
