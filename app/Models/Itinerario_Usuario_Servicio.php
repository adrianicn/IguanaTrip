<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerario_Usuario_Servicio extends Model
{
    //
     public static $rulesP = [
        
         'nombre_itinerario' => 'required'
    ];
     protected $table = 'itinerarios_usuario_servicios';
      
}
