<?php

namespace App\Repositories;

use App\Models\Usuario_Servicio;
use Illuminate\Support\Facades\DB;

class ServiciosOperadorRepository extends BaseRepository {

    /**
     * The Role instance.
     *
     * @var App\Models\Usuario Servicios
     */
    protected $userservicios;

    /**
     * Create a new ServiciosOperadorRepository instance.
     *
     * @param  App\Models\UserServicios $userservicios

     * @return void
     */
    public function __construct(Usuario_Servicio $userservicios) {
        $this->model = $userservicios;
    }

    /**
     * Save the User.
     *
     * @param  App\Models\UserServicio $user_servicios

     * @return void
     */
    private function save($user_servicios) {

        $user_servicios->save();
    }

    /**
     * Create a user.
     *
     * @param  array  $inputs
     * @param  int    $confirmation_code
     * @return App\Models\User 
     */
    public function storeNew($inputs) {
        $user_servicios = new $this->model;


        $user_servicios->id_catalogo_servicio = $inputs['id_catalogo_servicio'];
        $user_servicios->id_usuario_operador = $inputs['id_usuario_op'];
        $user_servicios->estado_servicio = '1';
        $this->save($user_servicios);
        return $user_servicios;
    }

    public function storeUpdateEstado($inputs, $usuario_servicio) {

        //Transformo el arreglo en un solo objeto
        foreach ($usuario_servicio as $servicioBase) {
            $inputs['id_usuario_servicio'] = $servicioBase->id;
            $this->updateServ($inputs,'estado_servicio_usuario');
        }
         
        return true;
    }
    /**
     * Create a user.
     *
     * @param  array  $inputs
     * @param  int    $usuario_servicio
     * @return App\Models\User 
     */
    public function storeUpdate($inputs, $usuario_servicio) {

        //Transformo el arreglo en un solo objeto
        foreach ($usuario_servicio as $servicioBase) {
            $inputs['id_usuario_servicio'] = $servicioBase->id;
            $this->updateServ($inputs,'estado_servicio');
        }
         
        return true;
    }

    //Realiza la logica del update
    public function updateServ($input,$campo) {
        $operador = new $this->model;
        $operadorData = $operador::where('id', $input['id_usuario_servicio'])
                ->update([$campo => $input[$campo]]);
    }

//Entrega el arreglo de Servicios por operador
    public function getServiciosOperador($id_usuario_operador) {
        $user_servicios = new $this->model;
        return $user_servicios::where('id_usuario_operador', $id_usuario_operador)
                        ->where('estado_servicio', '=', 1)->get();
    }

    //Entrega el arreglo de Servicios por operador completo incluyendo los nuevos ingresados por la 
    //pantalla de +
    public function getServiciosOperadorUnicos($id_usuario_operador) {
        return DB::table('usuario_servicios')
                        ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                        ->where('id_usuario_operador', $id_usuario_operador)
                        ->where('estado_servicio', '=', 1)
                        ->groupby('usuario_servicios.id_catalogo_servicio')->distinct()
                        ->select('catalogo_servicios.nombre_servicio','catalogo_servicios.id_catalogo_servicios','usuario_servicios.id','usuario_servicios.observaciones')
                        ->get();
    }
    
    public function getServiciosOperadorAll($id_usuario_operador) {
        return DB::table('usuario_servicios')
                        ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                        ->where('id_usuario_operador', $id_usuario_operador)
                        ->where('estado_servicio', '=', 1)
                        ->select('usuario_servicios.nombre_servicio','catalogo_servicios.id_catalogo_servicios','usuario_servicios.id')
                        ->get();
    }


    //entrega el registro que corresponde al usuario
    public function getServiciosOperadorporIdServicio($id_usuario_operador, $id_catalogo) {

        $user_servicio = Usuario_Servicio::where('id_usuario_operador', '=', $id_usuario_operador)
                        ->where('id_catalogo_servicio', '=', $id_catalogo)->get();
        return $user_servicio;
    }
    
     //entrega el registro que corresponde al id usuario servicio
    public function getServiciosOperadorporIdUsuarioServicio($id_usuario_servicio) {

        $user_servicio = Usuario_Servicio::where('id', '=', $id_usuario_servicio)->get();
                        
        return $user_servicio;
    }

}
