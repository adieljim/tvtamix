<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTecnicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_tecnica', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('realizacion');
            $table->string('camarografo');
            $table->string('asistente_camara');
            $table->string('sonidista');
            $table->string('investigacion');
            $table->string('edicion');
            $table->string('posproduccion');
            $table->string('produccion_ejecutiva');
            $table->string('lugar_produccion');
            $table->string('anio_produccion');
            $table->string('localidad');
            $table->longText('sinopsis');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('archivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_tecnica');
    }
}
