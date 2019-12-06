<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuartoFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuarto_fotos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagen');
            $table->unsignedBigInteger('id_Cuarto');
            $table->foreign('id_Cuarto')->references('id')->on('cuartos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuarto_fotos');
    }
}
