<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDificultadServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dificultad_servicios', function(Blueprint $table) {
            
            $table->increments('id_dificultad')->unique();
            $table->boolean('estado_dificultad');
            $table->text('descripcion_dificultad');
            $table->string('nombre_dificultad');
            $table->binary('imagen_dificultad');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dificultad_servicios');
    }
}
