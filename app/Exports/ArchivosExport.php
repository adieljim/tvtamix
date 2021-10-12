<?php

namespace App\Exports;

use App\Models\Archivo;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArchivosExport implements FromCollection
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
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
