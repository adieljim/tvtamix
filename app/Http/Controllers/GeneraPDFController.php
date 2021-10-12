<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Models\FichaTecnica;
use App\Models\Fotograma;
use App\Models\InfoGeneral;
use Barryvdh\DomPDF\Facade as PDF;

class GeneraPDFController extends Controller
{
    public function showPDF($id){
        $archivo = Archivo::find($id);
        $ficha = FichaTecnica::find($id);
        $info = InfoGeneral::find($id);
        $fotogramas = Fotograma::select('*')->where('id', $id)->get();
        $archivo->offsetSet("fotogramas", $fotogramas);
        $data = [
            'ficha' => $ficha,
            'info' => $info,
            'archivo' => $archivo,
        ];

        $pdf = PDF::loadView('archivos.showDocument', compact('data'));
        $pdf->setOptions (['defaultFont' => 'sans-serif' ]);

        return $pdf->stream();
    }
}
