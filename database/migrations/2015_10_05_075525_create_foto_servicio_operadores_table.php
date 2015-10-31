<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoServicioOperadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_servicio_operadores', function(Blueprint $table) {
            
            $table->increments('id_foto_usuario_servicio')->unique();
            $table->boolean('estado_foto_usuario_servicio');
            $table->text('tags_foto_usuario_servicio');
            $table->datetime('fecha_publicacion_foto_usuario_servicio');
            $table->string('nombre_foto_usuario_servicio');
            $table->datetime('fecha_fin_foto_usuario_servicio');
            $table->binary('foto_usuario_servicio');
            $table->binary('thmb_foto_servicio');
            $table->integer('id_usuario_servicio');
            $table->string('ip_ingreso_foto');
            $table->boolean('estado_revision_foto');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('foto_servicio_operadores');
    }
}
