<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('clave');
            $table->string('titulo_original');
            $table->string('genero');
            $table->time('duracion');
            $table->string('tipo_archivo');
            $table->string('formato_original');
            $table->string('codec_ac');
            $table->string('codec_bc');
            $table->string('huella_digital_video_ac');
            $table->string('huella_digital_video_bc');
            $table->date('fecha_digitalizacion');
            $table->timestamps();

            //$table->foreign('tipo_archivo')->references('tipo')->on('tipo_archivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos');
    }
}
