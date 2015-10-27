<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoLenguajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_lenguajes', function(Blueprint $table) {
            
            $table->increments('id_lenguaje')->unique();
            $table->string('nombre_lenguaje');
            $table->string('observaciones_lenguaje');
            $table->boolean('estado_lenguaje');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('catalogo_lenguajes');
    }
}
