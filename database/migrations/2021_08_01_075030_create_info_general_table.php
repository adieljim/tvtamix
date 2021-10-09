<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_general', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('lengua');
            $table->string('indice_tematico');
            $table->string('descripcion_general');
            $table->string('personajes_principales');
            $table->string('categoria_consulta');
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
        Schema::dropIfExists('info_general');
    }
}
