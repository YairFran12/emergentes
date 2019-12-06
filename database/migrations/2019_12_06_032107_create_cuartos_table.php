<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuartosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuartos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('lat',8,6);
            $table->float('lng',8,6);
            $table->string('estatus')->default(1);
            $table->string('sexo');
            $table->integer('inmueble');
            $table->float('precio_renta',12,4);
            $table->unsignedBigInteger('id_Arrendatario');
            $table->foreign('id_Arrendatario')->references('id')->on('arrendatarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuartos');
    }
}
