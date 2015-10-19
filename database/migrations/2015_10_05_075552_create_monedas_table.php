<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monedas', function(Blueprint $table) {
            
            $table->increments('id_moneda')->unique();
            $table->string('nombre_moneda');
            $table->binary('imagen_moneda');
            $table->boolean('estado_moneda');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('monedas');
    }
}
