<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatoArchivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formato_archivo', function (Blueprint $table) {
            $table->string('tipo_archivo');
            //$table->foreign('tipo_archivo')->references('tipo')->on('tipo_archivo')->onDelete("cascade");

            $table->string('nombre');
            $table->boolean('codec_bc');
            $table->boolean('codec_ac');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formato_archivo');
    }
}
