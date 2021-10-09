<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoArchivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_archivo')->insert([
            ['tipo' => 'AUDIOVISUAL'],
            ['tipo' => 'AUDIO'],
            ['tipo' => 'IMAGEN'],
            ['tipo' => 'PDF']
        ]);
    }
}
