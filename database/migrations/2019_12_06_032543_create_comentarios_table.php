<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion',150);
            $table->unsignedBigInteger('id_Cuarto');
            $table->foreign('id_Cuarto')->references('id')->on('cuartos');
            $table->unsignedBigInteger('id_Foraneo');
            $table->foreign('id_Foraneo')->references('id')->on('foraneos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
