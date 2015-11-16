<?php

namespace App\Repositories;

use App\Models\Usuario_Servicio;
use App\Models\Promocion_Usuario_Servicio;
use App\Models\Image;
use Illuminate\Support\Facades\DB;


class ServiciosOperadorRepository extends BaseRepository {

    /**
     * The Role instance.
     *
     * @var App\Models\Usuario Servicios
     */
    protected $userservicios;

    /**
     * The Promocion_Usuario_Servicio instance.
     *
     * @var App\Models\Role
     */
    protected $promocion;
    protected $image;
    /**
     * Create a new ServiciosOperadorRepository instance.
     *
     * @param  App\Models\UserServicios $userservicios

     * @return void
     */
    public function __construct(Usuario_Servicio $userservicios) {
        $this->model = $userservicios;
        $this->promocion = new Promocion_Usuario_Servicio();
        $this->image = new Image();
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

    public function storeNewPromocion($inputs) {

        $promocionU = new $this->promocion;


        $promocionU->id_usuario_servicio = $inputs['id_usuario_servicio'];
        $promocionU->id_catalogo_tipo_fotografia = 2;
        $promocionU->descripcion_promocion = $inputs['descripcion'];

        $promocionU->nombre_promocion = $inputs['nombre_promocion'];
        $promocionU->estado_promocion = 1;
        $promocionU->fecha_desde = $inputs['fecha_inicio'];
        $promocionU->fecha_hasta = $inputs['fecha_fin'];
        $promocionU->precio_normal = $inputs['precio_normal'];
        $promocionU->descuento = $inputs['descuento'];
        $promocionU->codigo_promocion = $inputs['codigo'];
        $promocionU->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $promocionU->updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->save($promocionU);
        return $promocionU;
    }

    public function storeUpdateEstado($inputs, $usuario_servicio) {

        //Transformo el arreglo en un solo objeto
        foreach ($usuario_servicio as $servicioBase) {
            $inputs['id_usuario_servicio'] = $servicioBase->id;
            $this->updateServ($inputs, 'estado_servicio_usuario');
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
            $this->updateServ($inputs, 'estado_servicio');
        }

        return true;
    }

    public function storeUpdatePromocion($inputs, $promo) {
unset($inputs['_token']);
        
            foreach ($promo as $servicioBase) {
        
                
               $pro=$this->promocion->find($servicioBase->id);
        
        //Transformo el arreglo en un solo objeto
        //$inputs['id'] =  $promo->id;
        
        $inputs['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
        $X=$pro->fill($inputs)->save();
        dd($X);
        }
        return true;
    }

    
    
    public function updatePromo($promo) {
        $operador = new $this->promocion;
        $operadorData = $operador::where('id', $promo['id'])
                ->update([$campo => $input[$campo]]);
    }

    //Realiza la logica del update
    public function updateServ($input, $campo) {
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

    //Entrega el arreglo de Servicios por operador
    public function getPromocionesOperador($id_promocion) {
        $promociones = new $this->promocion;
        return $promociones::where('id', $id_promocion)->get();
    }

    //Entrega el arreglo de Imagenes por promocion por operador
    public function getImagePromocionesOperador($id_promocion) {
        $promociones = new $this->image;
        return $promociones::where('id_auxiliar', $id_promocion)
                ->where('id_catalogo_fotografia','=',2)
                ->where('estado_fotografia','=',1)->get();
    }
    //Entrega el arreglo de Servicios por operador
    public function getPromocion($id_promocion) {

        return DB::table('promocion_usuario_servicio')
                        ->where('id', '=', $id_promocion)->get();
    }

    //Entrega el arreglo de Servicios por operador completo incluyendo los nuevos ingresados por la 
    //pantalla de +
    public function getServiciosOperadorUnicos($id_usuario_operador) {
        return DB::table('usuario_servicios')
                        ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                        ->where('id_usuario_operador', $id_usuario_operador)
                        ->where('estado_servicio', '=', 1)
                        ->groupby('usuario_servicios.id_catalogo_servicio')->distinct()
                        ->select('catalogo_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'usuario_servicios.id', 'usuario_servicios.observaciones', 'usuario_servicios.estado_servicio_usuario')
                        ->get();
    }

    public function getServiciosOperadorAll($id_usuario_operador) {
        return DB::table('usuario_servicios')
                        ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                        ->where('id_usuario_operador', $id_usuario_operador)
                        ->where('estado_servicio', '=', 1)
                        ->select('usuario_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'usuario_servicios.id', 'usuario_servicios.estado_servicio_usuario')
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
