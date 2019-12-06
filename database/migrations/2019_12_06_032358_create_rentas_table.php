<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_inicio');
            $table->date('fecha_solicitud');
            $table->unsignedBigInteger('id_Foraneo');
            $table->foreign('id_Foraneo')->references('id')->on('foraneos');
            $table->unsignedBigInteger('id_Cuartos');
            $table->foreign('id_Cuartos')->references('id')->on('cuartos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentas');
    }
}
