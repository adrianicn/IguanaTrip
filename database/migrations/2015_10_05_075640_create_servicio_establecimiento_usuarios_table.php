<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioEstablecimientoUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_establecimiento_usuarios', function(Blueprint $table) {
            
            $table->increments('id_servicio_est_usuario')->unique();
            $table->integer('id_usuario_servicio');
            $table->integer('id_servicio_establecimiento');
            $table->boolean('estado_servicio_est_usuario');
            $table->datetime('fecha_inicio_est_usuario');
            $table->datetime('fecha_fin_est_usuario');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servicio_establecimiento_usuarios');
    }
}
