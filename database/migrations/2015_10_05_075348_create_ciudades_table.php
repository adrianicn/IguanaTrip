<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiudadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades', function(Blueprint $table) {
            
            $table->increments('id_ciudad')->unique();
            $table->boolean('estado_ciudad');
            $table->string('nombre_ciudad');
            $table->string('detalle_ciudad');
            $table->text('observaciones_ciudad');
            $table->integer('id_provincia');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ciudades');
    }
}
