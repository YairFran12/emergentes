<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuartoServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuarto_servicios', function (Blueprint $table) {
            $table->string('descripcion');
            $table->integer('inluido');
            $table->unsignedBigInteger('id_Cuarto');
            $table->foreign('id_Cuarto')->references('id')->on('cuartos');
            $table->unsignedBigInteger('id_Servicio');
            $table->foreign('id_Servicio')->references('id')->on('servicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuarto_servicios');
    }
}
