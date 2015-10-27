<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminosCondicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminos_condiciones', function(Blueprint $table) {
            
            $table->increments('id_terminos_condiciones')->unique();
            $table->datetime('fecha_lanzamiento_terminos');
            $table->boolean('estado_terminos');
            $table->text('contenido_terminos');
            $table->datetime('fecha_fin_terminos');
            $table->text('referencia_terminos');
            $table->text('observaciones_referencia');
            $table->string('revision_terminos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('terminos_condiciones');
    }
}
