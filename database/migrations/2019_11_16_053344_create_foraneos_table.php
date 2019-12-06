<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForaneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foraneos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 50);
            $table->string('direccion', 150)->nullable($value = true);
            $table->string('tel_propio',20)->nullable($value = true);
            $table->string('tel_emergencia',20)->nullable($value = true);
            $table->date('fecha_n')->nullable($value = true);
            $table->string('sexo',10)->nullable($value = true);
            $table->string('correo',50)->nullable($value = true);
            $table->string('conraseña')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foraneos');
    }
}
