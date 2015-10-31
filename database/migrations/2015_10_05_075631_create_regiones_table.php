<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regiones', function(Blueprint $table) {
            
            $table->increments('id_region')->unique();
            $table->string('nombre_region');
            $table->text('descripcion_region');
            $table->boolean('estado_region');
            $table->integer('id_pais');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('regiones');
    }
}
