<?php

namespace App\Exports;

use App\Models\Archivo;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ArchivosExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View{
        $archivos = Archivo::select('*')
                    ->join('ficha_tecnica', function ($join) {
                        $join->on('archivos.id', '=', 'ficha_tecnica.id');
                    })
                    ->join('info_general', function ($join) {
                        $join->on('archivos.id', '=', 'info_general.id');
                    })
                    ->get();


        return view('layouts.excel-layout', [ 
            'archivos' => $archivos
        ]);
    }
    public function collection()
    {
        return Archivo::select('*')
        ->join('ficha_tecnica', function ($join) {
            $join->on('archivos.id', '=', 'ficha_tecnica.id');
        })
        ->join('info_general', function ($join) {
            $join->on('archivos.id', '=', 'info_general.id');
        })
        ->get();
    }
}
