<?php

namespace App\Repositories;

use App\Models\Usuario_Servicio;
use App\Models\Promocion_Usuario_Servicio;
use App\Models\Catalogo_Dificultad;
use App\Models\Detalle_Itinerario;
use App\Models\Itinerario_Usuario_Servicio;
use App\Models\Usuario_Operador;
use App\Models\Eventos_usuario_Servicio;
use App\Models\Invitaciones_Amigos;
use App\Models\UbicacionGeografica;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Models\SearchEngine;

class PublicServiceRepository extends BaseRepository {

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
    protected $catalogo_dificultad;
    protected $image;
    protected $itinerarios_u;
    protected $detalle_itinerarios_u;
    protected $eventos;
    protected $operador;
    protected $invitar_amigo;
    protected $ubicacion_geografica;
    protected $search_engine;

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
        $this->catalogo_dificultad = new Catalogo_Dificultad();
        $this->itinerarios_u = new Itinerario_Usuario_Servicio();
        $this->detalle_itinerarios_u = new Detalle_Itinerario();
        $this->eventos = new Eventos_usuario_Servicio();
        $this->operador = new Usuario_Operador();
        $this->invitar_amigo = new Invitaciones_Amigos();
        $this->ubicacion_geografica = new UbicacionGeografica();
        $this->search_engine = new SearchEngine();
    }

    //Entrega el arreglo de los servicios más visitados
    public function getUsuario_serv($ubicacion) {

        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion->city)
                            ->select('ubicacion_geografica.*')->first();

            if ($ubicGeo == null) {

                $visitados = DB::table('usuario_servicios')
                                ->where('usuario_servicios.estado_servicio', '=', '1')
                                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                                ->select('usuario_servicios.id')
                                ->orderBy('num_visitas', 'desc')
                                ->take(10)->get();
            } else {

                //foreach ($ubicGeo as $unique) {

                $visitados = DB::table('usuario_servicios')
                                ->where('usuario_servicios.id_canton', '=', $ubicGeo->id)
                                ->where('usuario_servicios.estado_servicio', '=', '1')
                                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                                ->select('usuario_servicios.id')
                                ->orderBy('num_visitas', 'desc')
                                ->take(10)->get();


                //}

                if ($visitados == null || count($visitados < 10)) {

                    //foreach ($ubicGeo as $unique) {

                    $visitados = DB::table('usuario_servicios')
                                    ->where('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                    ->where('usuario_servicios.estado_servicio', '=', '1')
                                    ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                                    ->select('usuario_servicios.id')
                                    ->orderBy('num_visitas', 'desc')
                                    ->take(10)->get();

                    // }
                }
            }
        } else {

            $visitados = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take(10)->get();
        }

        if ($visitados != null) {
            $array = array();
            foreach ($visitados as $visitado) {

                $array[] = $visitado->id;
            }



            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->whereIn('id_usuario_servicio', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre')
                    ->get();
        }
        return $imagenes;
    }

    //Obtiene las top imagenes de cada region
    public function getRegiones() {

        //array de las regiones del ecuador
        //1: Costa
        //2: Sierra
        //3:Oriente
        //4:Galapagos

        $array = array(1, 2, 3, 4);

        $id_imagenes = array();
        $final_imagen = array();

        $provincias = DB::table('ubicacion_geografica')
                ->whereIn('id_region', $array)
                ->select('ubicacion_geografica.id')
                ->get();
        
         
            foreach ($provincias as $provincia) {
                $id_imagenes = DB::table('images')
                            ->where('id_auxiliar', '=',$provincia->id)
                            ->where('estado_fotografia', '=', '1')
                            ->select('images.id')->take(3)->get();
                            
            if($id_imagenes!=null){
                foreach ($id_imagenes as $imagen) {
                    
                    $final_imagen[]=$imagen->id;
                }
                
            }
            }
        
        $imagenes = DB::table('images')
                ->join('ubicacion_geografica', 'ubicacion_geografica.id', '=', 'images.id_auxiliar')
                ->whereIn('images.id', $final_imagen)
                ->where('estado_fotografia', '=', '1')
                ->select('images.*', 'ubicacion_geografica.nombre','ubicacion_geografica.id as id_geo','ubicacion_geografica.id_region')
                ->get();


        return $imagenes;
    }

    //Entrega el detalle de la provincia
    public function getProvinciaDetails($id_provincia) {
        
          $provincias = DB::table('ubicacion_geografica')
                ->where('id','=', $id_provincia)
                ->select('ubicacion_geografica.*')
                ->first();
          return $provincias;
    }

    //Entrega el arreglo de Imagenes por provincia
    public function getImageporProvincia($id_provincia) {
           
        $imagenes = DB::table('images')
                ->where('id_auxiliar','=', $id_provincia)
                ->where('estado_fotografia', '=', '1')
                ->select('images.*')
                ->get();


        return $imagenes;
    }

    //Entrega el arreglo de Imagenes por promocion por operador
    public function getGenericImagePromocionesOperador($tipo, $idtipo) {
        $promociones = new $this->image;
        return $promociones::where('id_auxiliar', $idtipo)
                        ->where('id_catalogo_fotografia', '=', $tipo)
                        ->where('estado_fotografia', '=', 1)->get();
    }

    //Entrega el arreglo de Imagenes por promocion por operador
    public function getImageUbcacionGeografica($id, $tipo) {
        $promociones = new $this->image;
        return $promociones::where('id_auxiliar', $id)
                        ->where('id_catalogo_fotografia', '=', $tipo)
                        ->where('estado_fotografia', '=', 1)->get();
    }

    //Entrega el arreglo de Imagenes por promocion por operador
    public function getImageOperador($id_aux, $catalogo) {
        $promociones = new $this->image;
        return $promociones::where('id_auxiliar', $id_aux)
                        ->where('id_catalogo_fotografia', '=', $catalogo)
                        ->where('estado_fotografia', '=', 1)->get();
    }

    //Entrega el arreglo de Itinerarios por operador
    public function getItinerario($id_itinerario) {

        return DB::table('itinerarios_usuario_servicios')
                        ->where('id', '=', $id_itinerario)->get();
    }

    //Entrega el arreglo de Itinerarios por operador
    public function deleteItinerario($id_itinerario) {

        $pro = $this->detalle_itinerarios_u->find($id_itinerario);
        $pro->delete();
    }

    //Entrega el arreglo de eventos por operador
    public function getEvento($id_evento) {

        return DB::table('eventos_usuario_servicios')
                        ->where('id', '=', $id_evento)->get();
    }

    //Entrega el arreglo de Detalle Itinerarios por operador
    public function getDetalleItinerario($id_detalle_itinerario) {

        return DB::table('detalles_itinerario')
                        ->where('id', '=', $id_detalle_itinerario)->get();
    }

    //Entrega el arreglo de Itinerarios por id

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
                        ->select('catalogo_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'usuario_servicios.id', 'usuario_servicios.observaciones', 'usuario_servicios.estado_servicio_usuario', 'usuario_servicios.id_usuario_operador')
                        ->get();
    }

    public function getServiciosOperadorAll($id_usuario_operador) {
        return DB::table('usuario_servicios')
                        ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                        ->where('id_usuario_operador', $id_usuario_operador)
                        ->where('estado_servicio', '=', 1)
                        ->select('usuario_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'usuario_servicios.id', 'usuario_servicios.estado_servicio_usuario', 'usuario_servicios.id_usuario_operador')
                        ->get();
    }

    public function getEventosporId($id) {
        return DB::table('eventos_usuario_servicios')
                        ->where('id', $id)->get();
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

    public function getPermiso($id) {

        return DB::table('usuario_servicios')
                        ->join('usuario_operadores', 'usuario_servicios.id_usuario_operador', '=', 'usuario_operadores.id_usuario_op')
                        ->where('usuario_servicios.id', $id)
                        ->select('usuario_operadores.id_usuario_op', 'usuario_operadores.id_usuario')
                        ->first();
    }

    public function getPermisoPromocion($id) {

        return DB::table('usuario_servicios')
                        ->join('promocion_usuario_servicio', 'usuario_servicios.id', '=', 'promocion_usuario_servicio.id_usuario_servicio')
                        ->where('promocion_usuario_servicio.id', $id)
                        ->select('promocion_usuario_servicio.id_usuario_servicio')
                        ->first();
    }

    public function getPermisoEvento($id) {

        return DB::table('usuario_servicios')
                        ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                        ->where('eventos_usuario_servicios.id', $id)
                        ->select('eventos_usuario_servicios.id_usuario_servicio')
                        ->first();
    }

    public function getPermisoItinerario($id) {

        return DB::table('usuario_servicios')
                        ->join('itinerarios_usuario_servicios', 'usuario_servicios.id', '=', 'itinerarios_usuario_servicios.id_usuario_servicio')
                        ->where('itinerarios_usuario_servicios.id', $id)
                        ->select('itinerarios_usuario_servicios.id_usuario_servicio')
                        ->first();
    }

}
