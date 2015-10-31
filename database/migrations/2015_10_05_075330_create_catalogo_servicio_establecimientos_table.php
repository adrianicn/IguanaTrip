<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoServicioEstablecimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_servicio_establecimientos', function(Blueprint $table) {
            
            $table->increments('id_serv_est')->unique();
            $table->boolean('estado_servicio_establecimiento');
            $table->integer('id_catalogo_servicio');
            $table->string('nombre_servicio_establecimiento');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('catalogo_servicio_establecimientos');
    }
}
