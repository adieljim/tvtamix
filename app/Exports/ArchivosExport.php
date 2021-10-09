<?php

namespace App\Exports;

use App\Models\Archivo;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArchivosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Archivo::all();
    }
}
