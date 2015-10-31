<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_servicios', function(Blueprint $table) {
            
            $table->increments('id_base')->unique();
            $table->string('nombre_operador_base');
            $table->string('razon_social_base');
            $table->string('direccion_base');
            $table->string('longitud_base');
            $table->string('latitud_base');
            $table->string('representante_base');
            $table->string('telf_base_1');
            $table->string('telf_base_2');
            $table->integer('id_catalogo_servicio');
            $table->boolean('estado_base');
            $table->boolean('base_taken');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('base_servicios');
    }
}
