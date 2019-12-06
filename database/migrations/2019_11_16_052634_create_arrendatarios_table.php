<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrendatariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrendatarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->string('direccion',150)->nullable($value = true);
            $table->string('telefono',20)->nullable($value = true);
            $table->string('telefono_emer')->nullable($value = true);
            $table->string('genero',50)->nullable($value = true);
            $table->string('estatus')->default(1)->nullable($value = true);
            $table->string('foto_perfil')->nullable($value = true);
            $table->string('id_social')->nullable($value = true);
            $table->string('contrana')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrendatarios');
    }
}
