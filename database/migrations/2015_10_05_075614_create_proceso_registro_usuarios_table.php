<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesoRegistroUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proceso_registro_usuarios', function(Blueprint $table) {
            
            $table->increments('id_proceso_registro')->unique();
            $table->datetime('fecha_inicio_registro');
            $table->boolean('estado_registro');
            $table->boolean('fase_1_registro');
            $table->boolean('fase_2_registro');
            $table->datetime('fecha_fin_registro');
            $table->string('ip_inicio_registro');
            $table->string('ip_fin_registro');
            $table->datetime('fecha_fin_fase_1');
            $table->datetime('fecha_fin_fase_2');
            $table->integer('id_usuario_operador');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proceso_registro_usuarios');
    }
}
