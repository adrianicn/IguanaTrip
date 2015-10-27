<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerarioServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerario_servicios', function(Blueprint $table) {
            
            $table->increments('id_itinerario_servicio')->unique();
            $table->text('ubicacion');
            $table->string('coordenadas');
            $table->text('diahoradesde');
            $table->text('descripcion');
            $table->text('incluye');
            $table->integer('id_usuario_servicio');
            $table->text('extras');
            $table->text('condiciones');
            $table->integer('id_dificultad');
            $table->text('diahorahasta');
            $table->text('equipo_necesario');
            $table->text('observaciones');
            $table->string('nombre_itinerario');
            $table->float('precio_anterior');
            $table->float('precio_actual');
            $table->float('precio_grupo');
            $table->boolean('estado_itinerario');
            $table->text('promocion');
            $table->text('promocion_observaciones');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('itinerario_servicios');
    }
}
