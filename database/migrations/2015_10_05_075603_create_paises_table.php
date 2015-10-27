<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paises', function(Blueprint $table) {
            
            $table->increments('id_pais')->unique();
            $table->string('nombre_pais');
            $table->string('url_foto_pais');
            $table->boolean('estado_pais');
            $table->text('observaciones_pais');
            $table->string('coordenadas_pais_longitud');
            $table->string('coordenadas_pais_latitud');
            $table->integer('id_lenguaje1');
            $table->integer('id_lenguaje2');
            $table->integer('id_lenguaje3');
            $table->integer('id_lenguaje4');
            $table->integer('id_moneda1');
            $table->integer('id_moneda2');
            $table->integer('id_moneda3');
            $table->text('descripcion_pais');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paises');
    }
}
