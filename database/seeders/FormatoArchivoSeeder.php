<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FormatoArchivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('formato_archivo')->insert([
            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => 'BETA', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => 'VHS', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => 'SVHS', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => '8MM', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => 'Hi8', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => 'Mini DV', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => 'BETACAM', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => 'BETACAM', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => 'DVD', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => 'DIGITAL', 'codec_bc' => false, 'codec_ac' => false],

            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => 'MOV', 'codec_bc' => false, 'codec_ac' => true],
            ['tipo_archivo' => 'AUDIOVISUAL', 'nombre' => 'MP4/MKV', 'codec_bc' => true, 'codec_ac' => false],

            ['tipo_archivo' => 'AUDIO', 'nombre' => 'AUDIOCASSETTE', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIO', 'nombre' => 'CD', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIO', 'nombre' => 'DVD', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'AUDIO', 'nombre' => 'DIGITAL', 'codec_bc' => false, 'codec_ac' => false],

            ['tipo_archivo' => 'AUDIO', 'nombre' => 'WAV/AIFF', 'codec_bc' => false, 'codec_ac' => true],
            ['tipo_archivo' => 'AUDIO', 'nombre' => 'MP3', 'codec_bc' => true, 'codec_ac' => false],

            ['tipo_archivo' => 'IMAGEN', 'nombre' => 'NEGATIVO', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'IMAGEN', 'nombre' => 'POSITIVO', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'IMAGEN', 'nombre' => 'FOTOGRAFIA COLOR 2X', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'IMAGEN', 'nombre' => 'FOTOGRAFIA B/N 2X', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'IMAGEN', 'nombre' => 'FOTOGRAFIA COLOR 4X', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'IMAGEN', 'nombre' => 'FOTOGRAFIA B/N 4X', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'IMAGEN', 'nombre' => 'FOTOGRAFIA COLOR 6X', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'IMAGEN', 'nombre' => 'FOTOGRAFIA B/N 6X', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'IMAGEN', 'nombre' => 'DIGITAL', 'codec_bc' => false, 'codec_ac' => false],

            ['tipo_archivo' => 'IMAGEN', 'nombre' => 'PNG/JPEG', 'codec_bc' => false, 'codec_ac' => true],
            ['tipo_archivo' => 'IMAGEN', 'nombre' => 'JPG', 'codec_bc' => true, 'codec_ac' => false],

            ['tipo_archivo' => 'PDF', 'nombre' => 'TEXTO', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'PDF', 'nombre' => 'IMPRESO  REVISTA', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'PDF', 'nombre' => 'IMPRESO  LIBRO', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'PDF', 'nombre' => 'CARTEL', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'PDF', 'nombre' => 'FOLLETO', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'PDF', 'nombre' => 'TRIPTICO', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'PDF', 'nombre' => 'FLYER', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'PDF', 'nombre' => 'PORTADA', 'codec_bc' => false, 'codec_ac' => false],
            ['tipo_archivo' => 'PDF', 'nombre' => 'DIGITAL', 'codec_bc' => false, 'codec_ac' => false],

            ['tipo_archivo' => 'PDF', 'nombre' => 'PDF 12', 'codec_bc' => false, 'codec_ac' => true],
            ['tipo_archivo' => 'PDF', 'nombre' => 'PDF 6', 'codec_bc' => true, 'codec_ac' => false]
        ]);
    }
}
