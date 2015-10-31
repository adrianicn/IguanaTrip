<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminosUsuarioOperadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminos_usuario_operadores', function(Blueprint $table) {
            
            $table->increments('id_terminos_aceptados')->unique();
            $table->datetime('fecha_aceptacion');
            $table->integer('id_usuario_operador');
            $table->integer('ip_aceptacion');
            $table->datetime('fecha_fin_aceptacion');
            $table->integer('id_terminos_condiciones');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('terminos_usuario_operadores');
    }
}
