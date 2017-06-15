<?php

namespace App\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\Satisfechos_Usuario_Servicio;
use App\Models\Review_Usuario_Servicio;
use App\Models\Usuario_Servicio;
use Carbon\Carbon;

class PublicServiceRepository extends BaseRepository {
    /**
     * The Role instance.
     *
     * @var App\Models\Usuario Servicios
     */

    /**
     * Create a new ServiciosOperadorRepository instance.
     *
     * @param  App\Models\UserServicios $userservicios

     * @return void
     */
    protected $satisfechos;
    protected $usuario_servicio;
    protected $review;
    public function __construct() {
        $this->satisfechos = new Satisfechos_Usuario_Servicio();
        $this->usuario_servicio = new Usuario_Servicio();
        $this->review = new Review_Usuario_Servicio();
        
    }

//Entrega el arreglo de los servicios más visitados por provincia
    public function getHijosAtraccion($id_atraccion) {

        $visitados = DB::table('usuario_servicios')
                        ->where('usuario_servicios.estado_servicio', '=', '1')
                        ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                        ->where('usuario_servicios.id_padre', '=', $id_atraccion)
                        ->select('usuario_servicios.id')
                        ->orderBy('num_visitas', 'desc')
                        ->orderBy('prioridad', 'desc')
                        ->take(10)->get();




        if ($visitados != null) {
            $array = array();
            foreach ($visitados as $visitado) {


                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->where('id_usuario_servicio', '=', $visitado->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('usuario_servicios.id_padre', '=', $id_atraccion)
                        ->select('images.id')
                        ->orderBy('id_auxiliar', 'desc')
                        ->first();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen;
                    }
                }
            }


            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                    ->whereIn('images.id', $array)
                    ->where('usuario_servicios.id_padre', '=', $id_atraccion)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                    ->orderBy('id_auxiliar', 'desc')
                    ->get();
        } else {
            $imagenesF = DB::table('images')
                            ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                            ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                            ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                            ->where('estado_fotografia', '=', '1')
                            ->where('estado_fotografia', '=', '1')
                            ->where('usuario_servicios.id_padre', '=', $id_atraccion)
                            ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                            ->orderBy('id_auxiliar', 'desc')
                            ->take(10)->get();
        }

        return $imagenesF;
    }
    
       public function storeNew($inputs) {
        $review = new $this->review;
        $review->calificacion = trim($inputs['calificacion']);
        $review->nombre_reviewer = trim($inputs['nombre_reviewer']);
        $review->email_reviewer = trim($inputs['email_reviewer']);
        $review->ip_reviewer = trim($inputs['ip_reviewer']);
        $review->estado_review = '0';
        $review->id_usuario_servicio = trim($inputs['id_usuario_servicio']);
        $review->id_tipo_review = trim($inputs['id_tipo_review']);
        $review->confirmation_rev_code = $inputs['confirmation_rev_code'];
        $this->save($review);
        return $review;
    }

    //Entrega el arreglo de los servicios más visitados por provincia
    public function getVisitadosProvincia($id_provincia) {

        $visitados = DB::table('usuario_servicios')
                        ->where('usuario_servicios.estado_servicio', '=', '1')
                        ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                        ->where('usuario_servicios.id_provincia', '=', $id_provincia)
                        ->select('usuario_servicios.id')
                        ->orderBy('num_visitas', 'desc')
                        ->orderBy('prioridad', 'desc')
                        ->take(10)->get();




        if ($visitados != null) {
            $array = array();
            foreach ($visitados as $visitado) {


                $imagenes = DB::table('images')
                                ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                                ->where('id_usuario_servicio', '=', $visitado->id)
                                ->where('estado_fotografia', '=', '1')
                                ->select('images.id')
                                ->orderBy('id_auxiliar', 'desc')
                                ->take(2)->get();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen->id;
                    }
                }
            }






            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                    ->orderBy('id_auxiliar', 'desc')
                    ->get();
        } else {
            $imagenesF = DB::table('images')
                            ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                            ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                            ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                            ->where('estado_fotografia', '=', '1')
                            ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                            ->orderBy('id_auxiliar', 'desc')
                            ->take(10)->get();
        }
        return $imagenesF;
    }

    //Entrega el detalle geografico de la atraccion
    public function getUbicacionDet($id_ubicacion) {


        $ubicacion = DB::table('ubicacion_geografica')
                ->where('id', '=', $id_ubicacion)
                ->get();
        return $ubicacion;
    }

//Entrega el arreglo de los servicios más visitados por provincia
    public function getProvinciaIntern($id_provincia, $id_atraccion, $canton, $parroquia, $page_now, $page_stoped) {

        $arrayAtraccion = array();
        if ($parroquia == 0) {
            $parroquia = 1;
        }

        if ($canton == 0) {
            $canton = 1;
        }



        $img_Atraccion = $this->getHijosAtraccion($id_atraccion);
        //verifica que no se repitan las atracciones hijas
        if ($img_Atraccion != null) {
            $arrayAtraccion = array_pluck($img_Atraccion, 'id_usuario_servicio');
        }



        $visitados = DB::table('usuario_servicios')
                ->where('usuario_servicios.estado_servicio', '=', '1')
                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                ->where('usuario_servicios.id_provincia', '=', $id_provincia)
                ->whereIn('id_catalogo_servicio', array(4, 8))
                ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                ->whereNotIn('usuario_servicios.id', $arrayAtraccion)
                ->whereNotIn('usuario_servicios.id_canton', array($canton))
                ->whereNotIn('usuario_servicios.id_parroquia', array($parroquia))
                ->select('usuario_servicios.id')
                ->orderBy('num_visitas', 'desc')
                ->orderBy('prioridad', 'desc')
                ->take(10)
                ->get();



        if ($visitados != null) {
            $array = array();

            foreach ($visitados as $visitado) {

                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->where('id_usuario_servicio', '=', $visitado->id)
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->whereNotIn('images.id_usuario_servicio', $arrayAtraccion)
                        ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                        ->select('images.id')
                        ->orderBy('id_auxiliar', 'desc')
                        ->orderBy('usuario_servicios.prioridad', 'desc')
                        ->orderBy('usuario_servicios.num_visitas', 'desc')
                        ->first();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen;
                    }
                }
            }

            if ($page_now != null) {
                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }
            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                    ->whereIn('images.id', $array)
                    ->where('id_catalogo_fotografia', '=', '1')
                    ->whereNotIn('images.id', $arrayAtraccion)
                    ->whereNotIn('usuario_servicios.id_canton', array($canton))
                    ->whereNotIn('usuario_servicios.id_parroquia', array($parroquia))
                    ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                    ->orderBy('id_auxiliar', 'desc')
                    ->paginate(3);
        } else {
            $imagenesF = null;
        }
        return $imagenesF;
    }
    
    
    
    //Obtiene las fotografias de inspiracion
    public function getInspiration($take, $pagination) {

        



        $inspiration=null;
        
        if(session('locale') == 'es' ){
            $inspiration = DB::table('usuario_servicios')
                    ->join('servicio_establecimiento_usuario', 'usuario_servicios.id', '=', 'servicio_establecimiento_usuario.id_usuario_servicio')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [8])//codigo del catalogo inspiration
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->where('servicio_establecimiento_usuario.id_servicio_est', '=', '69')//español
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.created_at', 'desc')
                            ->take($take)->get();
        }
        else
        {
            $inspiration = DB::table('usuario_servicios')
                    ->join('servicio_establecimiento_usuario', 'usuario_servicios.id', '=', 'servicio_establecimiento_usuario.id_usuario_servicio')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [8])
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->where('servicio_establecimiento_usuario.id_servicio_est', '=', '68')//ingles
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.created_at', 'desc')
                            ->take($take)->get();
            
        }


        if (isset($inspiration) && $inspiration != null) {
            $array = array();

            foreach ($inspiration as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null){
                $array[] = $imagenes->id;}
            }





            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'usuario_servicios.id as id_usuario_serviciox')
                    ->orderBy('usuario_servicios.id_padre', 'asc')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->orderBy('usuario_servicios.created_at', 'desc')
                    ->paginate($pagination);

            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los servicios más visitados por provincia canton para la parte interna
    public function getCantonIntern($id_canton, $id_atraccion, $parroquia, $page_now, $page_stoped) {

        $arrayAtraccion = array();

        if ($parroquia == 0) {
            $parroquia = 1;
        }

        $img_Atraccion = $this->getHijosAtraccion($id_atraccion);
        //verifica que no se repitan las atracciones hijas
        if ($img_Atraccion != null) {
            $arrayAtraccion = array_pluck($img_Atraccion, 'id_usuario_servicio');
        }



        $visitados = DB::table('usuario_servicios')
                ->where('usuario_servicios.estado_servicio', '=', '1')
                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                ->where('usuario_servicios.id_canton', '=', $id_canton)
                ->whereIn('id_catalogo_servicio', array(4, 8))
                ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                ->whereNotIn('usuario_servicios.id', $arrayAtraccion)
                ->select('usuario_servicios.id')
                ->orderBy('num_visitas', 'desc')
                ->orderBy('prioridad', 'desc')
                ->take(10)
                ->get();



        if ($visitados != null) {
            $array = array();

            foreach ($visitados as $visitado) {

                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->where('id_usuario_servicio', '=', $visitado->id)
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->whereNotIn('images.id_usuario_servicio', $arrayAtraccion)
                        ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                        ->select('images.id')
                        ->orderBy('id_auxiliar', 'desc')
                        ->orderBy('usuario_servicios.prioridad', 'desc')
                        ->orderBy('usuario_servicios.num_visitas', 'desc')
                        ->first();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen;
                    }
                }
            }

            if ($page_now != null) {
                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }
            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_canton', '=', 'ubicacion_geografica.id')
                    ->whereIn('images.id', $array)
                    ->where('id_catalogo_fotografia', '=', '1')
                    ->whereNotIn('images.id', $arrayAtraccion)
                    ->where('usuario_servicios.id_parroquia', '<>', $parroquia)
                    ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                    ->orderBy('id_auxiliar', 'desc')
                    ->paginate(3);
        } else {
            $imagenesF = null;
        }
        return $imagenesF;
    }

    //Entrega el arreglo de los servicios más visitados por provincia
    public function getParroquiaIntern($id_parroquia, $id_atraccion) {

        $arrayAtraccion = array();
        $img_Atraccion = $this->getHijosAtraccion($id_atraccion);
        if ($img_Atraccion != null) {
            foreach ($arrayAtraccion as $imagen) {
                $arrayAtraccion[] = $imagen->id;
            }
        }

        $visitados = DB::table('usuario_servicios')
                ->where('usuario_servicios.estado_servicio', '=', '1')
                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                ->where('usuario_servicios.id_parroquia', '=', $id_parroquia)
                ->whereIn('id_catalogo_servicio', array(4, 8))
                ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                ->select('usuario_servicios.id')
                ->orderBy('num_visitas', 'desc')
                ->orderBy('prioridad', 'desc')
                ->take(10)
                ->get();



        if ($visitados != null) {
            $array = array();

            foreach ($visitados as $visitado) {

                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->where('id_usuario_servicio', '=', $visitado->id)
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->where('estado_fotografia', '=', '1')
                        ->whereNotIn('images.id', $arrayAtraccion)
                        ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                        ->select('images.id')
                        ->orderBy('id_auxiliar', 'desc')
                        ->orderBy('usuario_servicios.prioridad', 'desc')
                        ->orderBy('usuario_servicios.num_visitas', 'desc')
                        ->first();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen;
                    }
                }
            }

            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('ubicacion_geografica', 'usuario_servicios.id_parroquia', '=', 'ubicacion_geografica.id')
                    ->whereIn('images.id', $array)
                    ->where('id_catalogo_fotografia', '=', '1')
                    ->whereNotIn('images.id', $arrayAtraccion)
                    ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                    ->orderBy('id_auxiliar', 'desc')
                    ->paginate(3);
        } else {
            $imagenesF = null;
        }
        return $imagenesF;
    }
    
    
    
    //Entrega el arreglo de los catalogos según la localización padre
    public function getBusquedaInicialCatalogoPadre($catalogo, $ubicacion, $page_now, $page_stoped, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {



          $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
          
            if( is_null($ubicGeo))
            {
            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', '207')
                            ->select('ubicacion_geografica.*')->first();    
                
            }
        }
        ///Si la $ubicacion es null
        else {
            $ubicGeo = null;
        }
        
        if ($ubicGeo == null) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        } else {


            $eventos = DB::table('usuario_servicios')
                            
                               ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->idUbicacionGeograficaPadre);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
                            
                             $eventosP = DB::table('usuario_servicios')
                            
                               ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }


        if ($eventos != null) {
            $array = array();
            $array1 = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }
            
              foreach ($eventosP as $toK) {
                $imagenesx = DB::table('images')
                        ->where('images.id_auxiliar', '=', $toK->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenesx != null)
                    $array1[] = $imagenesx->id;
            }

            //$allCity = $this->getEventsDepCityAll($ubicacion, $take);
            if($page_now!=null){
            $currentPage = ($page_now - $page_stoped);
            // You can set this to any page you want to paginate to
            // Make sure that you call the static method currentPageResolver()
            // before querying users
            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });}

            
            
            
            
       
            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->where('estado_fotografia', '=', '1')
                    ->whereIn('images.id', $array)
                    ->whereNotIn('images.id', $array1)
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select(array('usuario_servicios.id as id_usr_serv', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->groupby('usuario_servicios.id')
                      ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);
       

            
            

            return $imagenes;
        }
        return null;
    }
    
    

    
    //Entrega el arreglo de los catalogos según la localización
    public function getBusquedaInicialCatalogo($catalogo, $ubicacion, $page_now, $page_stoped, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {



          $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
            if( is_null($ubicGeo))
            {
            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', '207')
                            ->select('ubicacion_geografica.*')->first();    
                
            }
        }
        ///Si la $ubicacion es null
        else {
            $ubicGeo = null;
        }
        
        if ($ubicGeo == null) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        } else {


            $eventos = DB::table('usuario_servicios')
                            
                               ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }


        if ($eventos != null) {
            $array = array();
            $array1 = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }

            //$allCity = $this->getEventsDepCityAll($ubicacion, $take);
            if($page_now!=null){
            $currentPage = ($page_now - $page_stoped);
            // You can set this to any page you want to paginate to
            // Make sure that you call the static method currentPageResolver()
            // before querying users
            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });}

            $resulte = array_diff($array, $array1);
            
            
       
            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->where('estado_fotografia', '=', '1')
                    ->whereIn('images.id', $resulte)
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select(array('usuario_servicios.id as id_usr_serv', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->groupby('usuario_servicios.id')
                      ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);
       

            
            

            return $imagenes;
        }
        return null;
    }
    
    
    
    //Entrega el arreglo de los catalogos según la localización
    public function getBusquedaInicialCatalogoFiltros($catalogo, $ubicacion,$filtros,$precio_min,$precio_max, $page_now, $page_stoped, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {



          $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
          
            if( is_null($ubicGeo))
            {
            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', '207')
                            ->select('ubicacion_geografica.*')->first();    
                
            }
        }
        ///Si la $ubicacion es null
        else {
            $ubicGeo = null;
        }
        
        if ($ubicGeo == null) {
            $eventos = DB::table('usuario_servicios')
                                ->join('servicio_establecimiento_usuario', 'usuario_servicios.id', '=', 'servicio_establecimiento_usuario.id_usuario_servicio')
                                ->join('catalogo_servicio_establecimiento', 'catalogo_servicio_establecimiento.id', '=', 'servicio_establecimiento_usuario.id_servicio_est')
                                ->where('usuario_servicios.estado_servicio', '=', '1')
                                ->where('servicio_establecimiento_usuario.estado_servicio_est_us', '=', '1')
                                ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                                ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                                ->whereIn('catalogo_servicio_establecimiento.id',$filtros)
                                ->select('usuario_servicios.id')
                                ->orderBy('usuario_servicios.num_visitas', 'desc')
                                ->take($take)->get();
        } else {
                        $eventos = DB::table('usuario_servicios')
                            ->join('servicio_establecimiento_usuario', 'usuario_servicios.id', '=', 'servicio_establecimiento_usuario.id_usuario_servicio')
                            ->join('catalogo_servicio_establecimiento', 'catalogo_servicio_establecimiento.id', '=', 'servicio_establecimiento_usuario.id_servicio_est')
                               ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('servicio_establecimiento_usuario.estado_servicio_est_us', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                                    ->where('usuario_servicios.precio_desde', '>=',$precio_min)
                                    ->where('usuario_servicios.precio_hasta', '<=',$precio_max)
                            ->whereIn('catalogo_servicio_establecimiento.id',$filtros)
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }


        if ($eventos != null) {
            $array = array();
            $array1 = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }

            //$allCity = $this->getEventsDepCityAll($ubicacion, $take);
            if($page_now!=null){
            $currentPage = ($page_now - $page_stoped);
            // You can set this to any page you want to paginate to
            // Make sure that you call the static method currentPageResolver()
            // before querying users
            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });}

            $resulte = array_diff($array, $array1);
            
            
       
            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->where('estado_fotografia', '=', '1')
                    ->whereIn('images.id', $resulte)
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select(array('usuario_servicios.id as id_usr_serv', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->groupby('usuario_servicios.id')
                      ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->get();
       

            
            

            return $imagenes;
        }
        return null;
    }
    
    
    
    //Entrega el arreglo de los eventos según la localización
    public function getEventsDepProvince($ubicacion, $page_now, $page_stoped, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {



          $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
          
            if( is_null($ubicGeo))
            {
            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', '207')
                            ->select('ubicacion_geografica.*')->first();    
                
            }
        }
        ///Si la $ubicacion es null
        else {
            $ubicGeo = null;
        }
        if ($ubicGeo == null) {
            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                            ->where('eventos_usuario_servicios.fecha_hasta', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('eventos_usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        } else {


            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                               ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->idUbicacionGeograficaPadre);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('eventos_usuario_servicios.fecha_hasta', '>=', "'" . Carbon::now() . "'")
                            ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('eventos_usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }


        if ($eventos != null) {
            $array = array();
            $array1 = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '4')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }

            $allCity = $this->getEventsDepCityAll($ubicacion, $take);
            if($page_now!=null){
            $currentPage = ($page_now - $page_stoped);
            // You can set this to any page you want to paginate to
            // Make sure that you call the static method currentPageResolver()
            // before querying users
            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });}

            $resulte = array_diff($array, $array1);
            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                    ->whereIn('images.id', $resulte)
                    ->whereNotIn('images.id', $allCity)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'eventos_usuario_servicios.*')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);


            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización
    public function getEventsIndepProvince($ubicacion, $page_now, $page_stoped, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {



            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
            
              if( is_null($ubicGeo))
            {
            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', '207')
                            ->select('ubicacion_geografica.*')->first();    
                
            }
        }
        ///Si la $ubicacion es null
        else {
            $ubicGeo = null;
        }
        if ($ubicGeo == null) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', '8')
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->where('usuario_servicios.fecha_fin', '>=', "'" . Carbon::now() . "'")
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        } else {


              $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', '8')
                            ->where('fecha_fin', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            
                            ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->idUbicacionGeograficaPadre);
                            })
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }
        


        if ($eventos != null) {
            $array = array();
            $array1 = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }

            
            $allCity = $this->getEventsIndepCityAll($ubicacion, $take);
            if($page_now!=null){
            $currentPage = ($page_now - $page_stoped);
            // You can set this to any page you want to paginate to
            // Make sure that you call the static method currentPageResolver()
            // before querying users
            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });}

            $resulte = array_diff($array, $array1);
            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->whereIn('images.id', $resulte)
                    ->whereNotIn('images.id', $allCity)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);


            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización que son dependientes de un servicio
    public function getPromoDepCity($ubicacion, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {

           $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
           
             if( is_null($ubicGeo))
            {
            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', '207')
                            ->select('ubicacion_geografica.*')->first();    
                
            }
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
        
        
        if ($ubicGeo != null) {
            $eventos = DB::table('usuario_servicios')
                            ->join('promocion_usuario_servicio', 'usuario_servicios.id', '=', 'promocion_usuario_servicio.id_usuario_servicio')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('promocion_usuario_servicio.estado_promocion', '=', '1')
                            ->where('promocion_usuario_servicio.fecha_hasta', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                               ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->select('promocion_usuario_servicio.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }

        if (isset($eventos)&&$eventos != null) {
            $array = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '2')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }





            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('promocion_usuario_servicio', 'usuario_servicios.id', '=', 'promocion_usuario_servicio.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'promocion_usuario_servicio.*')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);

            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización que son dependientes de un servicio
    public function getEventsDepCity($ubicacion, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {

           $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
           
             if( is_null($ubicGeo))
            {
            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', '207')
                            ->select('ubicacion_geografica.*')->first();    
                
            }
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
           if ($ubicGeo->id==1) {
              $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                               
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                            ->where('fecha_hasta', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('eventos_usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }
        
        if ($ubicGeo != null && $ubicGeo->id!=1) {
            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                               ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                            ->where('fecha_hasta', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('eventos_usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }

        if (isset($eventos)&&$eventos != null) {
            $array = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '4')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }





            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'eventos_usuario_servicios.*')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);

            return $imagenes;
        }
        return null;
    }

    
    
    //Entrega el arreglo de los eventos según la localización
    public function getAtraccionesByCity($ubicacion, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
            
              if( is_null($ubicGeo))
            {
            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', '207')
                            ->select('ubicacion_geografica.*')->first();    
                
            }
        }

        ///Si la $ubicacion es null
        else {
            return null;
        }

        

        
        if ($ubicGeo->id==1) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [4])
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }

        if ($ubicGeo != null && $ubicGeo->id!=1) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [4])
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            
                            ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }
        

        if (isset($eventos)&&$eventos != null) {
            $array = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }





            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre','usuario_servicios.id as id_usuario_serviciox')
                    ->orderBy('usuario_servicios.id_padre', 'asc')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->orderByRaw("RAND()")
                    ->paginate($pagination);

            return $imagenes;
        }
        return null;
    }

    
    
    //Entrega el arreglo de los eventos según la localización
    public function getEventsIndepCity($ubicacion, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
            
              if( is_null($ubicGeo))
            {
            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', '207')
                            ->select('ubicacion_geografica.*')->first();    
                
            }
        }

        ///Si la $ubicacion es null
        else {
            return null;
        }


           if ($ubicGeo->id==1) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [8])
                            ->where('fecha_fin', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                   
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }

        if ($ubicGeo != null && $ubicGeo->id!=1) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->whereIn('usuario_servicios.id_catalogo_servicio', [8])
                            ->where('fecha_fin', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            
                            ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }
        

        if (isset($eventos) && $eventos != null) {
            $array = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }





            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'usuario_servicios.id as id_usuario_serviciox', 'catalogo_servicios.nombre_servicio as catalogo_nombre')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);

            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización para la pantalla interna
    public function getPromoIntern($ubicacion) {


        $array = array();
        $array = array_pluck($ubicacion, 'id_usuario_servicio');

        $promo = DB::table('promocion_usuario_servicio')
                ->whereIn('promocion_usuario_servicio.id_usuario_servicio', $array)
                ->where('fecha_hasta', '>=', "'" . Carbon::now() . "'")
                ->where('promocion_usuario_servicio.estado_promocion', '=', '1')
                ->select('promocion_usuario_servicio.id')
                ->take(10)
                ->get();


        if ($promo != null) {
            $array = array();

            foreach ($promo as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '2')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }


            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('promocion_usuario_servicio', 'usuario_servicios.id', '=', 'promocion_usuario_servicio.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->where('id_catalogo_fotografia', '=', '2')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'promocion_usuario_servicio.*')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->get();

            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización para la pantalla interna
    public function getEventIntern($ubicacion) {


        $array = array();

        foreach ($ubicacion as $ub) {
            $array[] = $ub->id_usuario_servicio;
        }

        $eventos = DB::table('eventos_usuario_servicios')
                        ->whereIn('eventos_usuario_servicios.id_usuario_servicio', $array)
                        ->where('fecha_hasta', '>=', "'" . Carbon::now() . "'")
                        ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                        ->select('eventos_usuario_servicios.id')
                        ->orderBy('eventos_usuario_servicios.id_usuario_servicio', 'desc')
                        ->take(10)->get();

        if ($eventos != null) {
            $array = array();

            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '4')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }


            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->where('id_catalogo_fotografia', '=', '4')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'eventos_usuario_servicios.*')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->get();

            return $imagenes;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización
    public function getEventsDepCityAll($ubicacion, $take) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {

           $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
           
             if( is_null($ubicGeo))
            {
            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', '207')
                            ->select('ubicacion_geografica.*')->first();    
                
            }
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
        if ($ubicGeo != null) {


            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                               ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->idUbicacionGeograficaPadre);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('eventos_usuario_servicios.estado_evento', '=', '1')
                            ->where('fecha_hasta', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('eventos_usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }

        if ($eventos != null) {
            $array = array();


            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '4')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }


            return $array;
        }
        return null;
    }

    //Entrega el arreglo de los eventos según la localización
    public function getEventsIndepCityAll($ubicacion, $take) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion)
                            ->orWhere('ubicacion_geografica.nombre', 'like', $ubicacion . "%")
                            ->orWhere('ubicacion_geografica.nombre', 'like', "%" . $ubicacion . "%")
                            ->select('ubicacion_geografica.*')->first();
            
              if( is_null($ubicGeo))
            {
            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.id', '=', '207')
                            ->select('ubicacion_geografica.*')->first();    
                
            }
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
        if ($ubicGeo != null) {
            $eventos = DB::table('usuario_servicios')
                              ->where(function($query)  use ($ubicGeo) {
                                $query->orWhere('usuario_servicios.id_parroquia', '=', $ubicGeo->id)
                                ->orWhere('usuario_servicios.id_provincia', '=', $ubicGeo->id)
                                 ->orWhere('usuario_servicios.id_canton', '=', $ubicGeo->id);
                            })
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', '8')
                            ->where('fecha_fin', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('usuario_servicios.id')
                            ->orderBy('num_visitas', 'desc')
                            ->take($take)->get();
        }

        if ($eventos != null) {
            $array = array();


            foreach ($eventos as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array[] = $imagenes->id;
            }


            return $array;
        }
        return null;
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
            $array = array_pluck($visitados, 'id');
            //$array = array();
            //foreach ($visitados as $visitado) {
            //  $array[] = $visitado->id;
            //}



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

    
      public function updateCodeReview($code) {
        $review = new $this->review;
        $review1 = $review::where('confirmation_rev_code', $code);
                $review1->update(['review_verificado' =>'1']);
        
                $review1->update(['seen' =>'1']);
                $review1->update(['estado_review' =>'1']);
                $review1->update(['updated_at' =>\Carbon\Carbon::now()->toDateTimeString()]);
        
        
        
       
    }
    
    
        public function getRevCode($code) {
        $review = new $this->review;
        $review1 = $review::where('confirmation_rev_code', $code)
                ->select('id_usuario_servicio')
                ->first();
                
        return $review1;
        
        
       
    }
    
     //Motor de busqueda
    public function getSearchTotal($term) {



        $query = DB::table('searchengine')
                ->whereRaw("match(search) against ('" . $term . "')")
                ->orWhere('searchengine.search', 'like', "%" . $term)
                ->orWhere('searchengine.search', 'like', $term . "%")
                ->orWhere('searchengine.search', 'like', "%" . $term . "%")
                ->select('searchengine.id_usuario_servicio','searchengine.tipo_busqueda')
                ->get();


        return $query;
    }
    
    
        public function getDespliegueBusqueda($codigos, $pagination,$tipoBusqueda) {

        /* Se despliegan las imagenes de los codigos encontrados en las busquedas
         *          */
        
             $array1 = array();

            foreach ($codigos as $to) {
          
                if($to->tipo_busqueda==$tipoBusqueda)
                    $array[] = $to->id_usuario_servicio;
            }

        
            $servicio = DB::table('usuario_servicios')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                    ->whereIn('usuario_servicios.id', $array)
                            ->select('usuario_servicios.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->get();
        
        if ($servicio != null) {
            $array = array();
            $array1 = array();

            foreach ($servicio as $to) {
                $imagenes = DB::table('images')
                        ->where('images.id_auxiliar', '=', $to->id)
                        ->where('estado_fotografia', '=', '1')
                        ->where('id_catalogo_fotografia', '=', '1')
                        ->select('images.id')
                        ->first();

                if ($imagenes != null)
                    $array1[] = $imagenes->id;
            }

      
            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->where('estado_fotografia', '=', '1')
                    
                    ->whereIn('images.id', $array1)
                    
                    ->select(array('usuario_servicios.id as id_usr_serv', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->groupby('usuario_servicios.id')
                    ->orderBy('usuario_servicios.prioridad', 'desc')
                    ->orderBy('usuario_servicios.num_visitas', 'desc')
                    ->paginate($pagination);





            return $imagenes;
        }
        return null;
    }
    
    //Obtiene las top n places de cada provincia
    public function getTopPlaces($n,$region) {

//array de las regiones del ecuador
//1: Costa
//2: Sierra
//3:Oriente
//4:Galapagos

        $array = array($region);

        $final_top = array();

        $provincias = DB::table('ubicacion_geografica')
                ->whereIn('id_region', $array)
                ->select('ubicacion_geografica.id')
                ->get();


        foreach ($provincias as $provincia) {
            $top = DB::table('usuario_servicios')
                            ->where('usuario_servicios.id_provincia', '=', $provincia->id)
                            ->where('usuario_servicios.id_catalogo_servicio', '=', '4')
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->orderBy('usuario_servicios.prioridad', 'desc')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($n)->get();

            if ($top != null) {
                foreach ($top as $to) {
                    $imagenes = DB::table('images')
                            ->where('images.id_auxiliar', '=', $to->id)
                            ->where('estado_fotografia', '=', '1')
                            ->where('id_catalogo_fotografia', '=', '1')
                            ->select('images.id')
                            ->first();

                    if ($imagenes != null)
                        $final_top[] = $imagenes->id;
                }
            }
        }


        $imagenesF = DB::table('images')
                ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                ->join('ubicacion_geografica', 'usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                ->whereIn('images.id', $final_top)
                ->select('images.*', 'usuario_servicios.*', 'ubicacion_geografica.nombre', 'ubicacion_geografica.id as id_geo', 'ubicacion_geografica.id_region')
                ->orderBy('usuario_servicios.prioridad', 'desc')
                ->orderBy('usuario_servicios.num_visitas', 'desc')
                ->paginate(4);

        return $imagenesF;
    }
//Obtiene las top imagenes de cada region
    public function getImageporRegion($id_region) {

//array de las regiones del ecuador
//1: Costa
//2: Sierra
//3:Oriente
//4:Galapagos



        $id_imagenes = array();
        $final_imagen = array();

        
        
        $provincias = DB::table('ubicacion_geografica')
                ->join('usuario_servicios','usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                ->where('id_region', '=', $id_region)
                ->select('usuario_servicios.id')
                ->take(50)
                ->get();
        
        
        


        foreach ($provincias as $provincia) {
            $id_imagenes = DB::table('images')
                            ->where('id_auxiliar', '=', $provincia->id)
                    ->where('id_catalogo_fotografia', '=', 1)
                            ->where('estado_fotografia', '=', '1')
                            ->select('images.id')->take(1)->get();

            if ($id_imagenes != null) {
                foreach ($id_imagenes as $imagen) {

                    $final_imagen[] = $imagen->id;
                }
            }
        }

        $imagenes = DB::table('images')
                ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_auxiliar')
                ->whereIn('images.id', $final_imagen)
                ->where('estado_fotografia', '=', '1')
                ->select('images.*', 'usuario_servicios.nombre_servicio as nombre', 'usuario_servicios.id as id_geo', 'usuario_servicios.id as id_region', 'usuario_servicios.detalle_servicio as descripcion_esp', 'usuario_servicios.detalle_servicio as descripcion_eng')
                ->get();


        return $imagenes;
    }

//Entrega el detalle de la provincia
    public function getProvinciaDetails($id_provincia) {

        $provincias = DB::table('ubicacion_geografica')
                ->where('id', '=', $id_provincia)
                ->select('ubicacion_geografica.*')
                ->first();
        return $provincias;
    }

      private function save($objeto) {

        $objeto->save();
    }

            //Actualiza el numero de visitas
    public function saveVisita($nombre,$atraccion) {

        //Transformo el arreglo en un solo objeto
        
         $visitas = DB::table('usuario_servicios')
                ->where('usuario_servicios.id', '=', $atraccion)
                ->select('usuario_servicios.num_visitas')
                    ->first();
         

         $operador = new $this->usuario_servicio;
        $operadorData = $operador::where('id', $atraccion)
                ->update(['num_visitas' =>$visitas->num_visitas+1],
                        ['fecha_ultima_visita' =>\Carbon\Carbon::now()->toDateTimeString()]);
        

        return true;



        
    }
    
        //Actualiza el estado de la promocion
    public function storeLikes($atraccion,$ip) {

        //Transformo el arreglo en un solo objeto
        
            
         $objeto = new $this->satisfechos;
        $objeto->id_usuario_servicio = $atraccion;
        $objeto->ip_turista = $ip;
        $objeto->id_user = 0;
        
        $objeto->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $objeto->updated_at = \Carbon\Carbon::now()->toDateTimeString();

        $this->save($objeto);
        return true;



        
    }
    
    //Entrega el detalle de los likes por ip y por id
    public function getlikesIp($id_atraccion, $ip) {

        $likes = DB::table('satisfechos_usuario_servicio')
                ->where('satisfechos_usuario_servicio.id_usuario_servicio', '=', $id_atraccion)
                ->where('satisfechos_usuario_servicio.ip_turista', '=', $ip)
                ->first();
        return $likes;
    }

    
       //Entrega el detalle de los likes por ip y por id
    public function getReviewsIpEmail($id_atraccion, $email) {

        $review = DB::table('reviews_usuario_servicio')
                ->where('id_usuario_servicio', '=', $id_atraccion)
                ->where('email_reviewer', '=', $email)
                ->where('estado_review', '=', "1")
                ->where('review_verificado', '=', "1")
                
                ->first();
        return $review;
    }

    //Actualiza el estado de la promocion
    public function storeUpdateLikes($inputs, $Promocion) {

        //Transformo el arreglo en un solo objeto
        foreach ($Promocion as $servicioBase) {
            $inputs['id'] = $servicioBase->id;
            $this->updateServPromo($inputs, 'estado_promocion');
        }



        return true;
    }

    //Entrega el detalle de los servicios
    public function getServicios($id_provincia) {



        $servicios = DB::table('catalogo_servicios')
                        ->join('usuario_servicios', 'id_catalogo_servicios', '=', 'usuario_servicios.id_catalogo_servicio')
                        ->where('usuario_servicios.id_provincia', '=', $id_provincia)
                        ->where('usuario_servicios.estado_servicio_usuario', '=',1)
                         ->where('usuario_servicios.estado_servicio', '=',1)
                        ->select('catalogo_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'catalogo_servicios.nombre_servicio_eng')
                        ->distinct()->get();




        return $servicios;
    }
    
    
      //Entrega el precio minimo de los servicios id_catalogo
    public function getMinPrice($id_catalogo) {


        $servicios = DB::table('usuario_servicios')
                        ->where('usuario_servicios.id_catalogo_servicio','=',$id_catalogo)
                        ->min('precio_desde');

        return $servicios;
    }
    
    
      //Entrega el precio max de los servicios id_catalogo
    public function getMaxPrice($id_catalogo) {


  $servicios = DB::table('usuario_servicios')
                        ->where('usuario_servicios.id_catalogo_servicio','=',$id_catalogo)
                        ->max('precio_hasta');

        return $servicios;
    }
    
      //Entrega el detalle de los servicios
    public function getServiciosAll() {



        $servicios = DB::table('catalogo_servicios')
                        ->join('usuario_servicios', 'id_catalogo_servicios', '=', 'usuario_servicios.id_catalogo_servicio')
                        ->select('catalogo_servicios.nombre_servicio', 'catalogo_servicios.id_catalogo_servicios', 'catalogo_servicios.nombre_servicio_eng')
                        ->distinct()->get();




        return $servicios;
    }

    //Entrega la cuenta de likes por usuario_servicio
    public function getlikes($id_atraccion) {


        $servicios = DB::table('satisfechos_usuario_servicio')
                ->select(array(DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                ->where('satisfechos_usuario_servicio.id_usuario_servicio', '=', $id_atraccion)
                ->groupby('satisfechos_usuario_servicio.id_usuario_servicio')
                ->first();


        return $servicios;
    }
    
    /**
	 * Create a new review instance.
	 *
	 * @param  array  $inputs
	 * @param  int    $confirmation_code
	 * @return App\Models\Review 
	 */
	public function store($inputs, $confirmation_code = null)
	{
		$rev = new $this->review;

		if($confirmation_code) {
			$rev->confirmation_rev_code = $confirmation_code;
		} else {
			$rev->review_verificado = 1;
		}

		$this->save($rev, $inputs);

		return $user;
	}
        
        /**
	 * Save the User.
	 *
	 * @param  App\Models\User $user
	 * @param  Array  $inputs
	 * @return void
	 */
  	private function saveRev($rev, $inputs)
	{		
		if(isset($inputs['seen'])) 
		{
			$user->seen = $inputs['seen'] == 'true';		
		} else {

			$user->username = $inputs['username'];
			$user->email = $inputs['email'];

			if(isset($inputs['role'])) {
				$user->role_id = $inputs['role'];	
			} else {
				$role_user = $this->role->where('slug', 'user')->first();
				$user->role_id = $role_user->id;
			}
		}

		$user->save();
	}

    
    //Despliea todos lis tipos de revies para calificar
    public function getTiporeviews($id_atraccion) {

        $reviews = DB::table('tipo_reviews')
                ->join('usuario_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'tipo_reviews.catalogo_servicio')
                ->where('usuario_servicios.id', '=', $id_atraccion)
                ->where('tipo_estado', '=', "1")
                ->select('tipo_reviews.*')
                ->get();

        return $reviews;
    }

    //Entrega el detalle de los servicios
    public function getReviews($id_atraccion) {

        $chuncks= DB::table('tipo_reviews')
                ->join('usuario_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'tipo_reviews.catalogo_servicio')
                ->where('usuario_servicios.id', '=', $id_atraccion)
                ->where('tipo_reviews.tipo_estado', '=', "1")
                ->select(array(DB::raw('COUNT(tipo_reviews.id) as cantidad')))
                ->first();
        
        
        
        if($chuncks==null)
        $division=1;
        else
            $division=$chuncks->cantidad*2;
        
        $reviews = DB::table('reviews_usuario_servicio')
                ->join('tipo_reviews', 'reviews_usuario_servicio.id_tipo_review', '=', 'tipo_reviews.id')
                ->where('reviews_usuario_servicio.id_usuario_servicio', '=', $id_atraccion)
                ->where('reviews_usuario_servicio.estado_review', '=', "1")
                ->where('reviews_usuario_servicio.review_verificado', '=', "1")
                ->select('reviews_usuario_servicio.*','tipo_reviews.peso_review','tipo_reviews.tipo_review','tipo_reviews.tipo_review_eng')
                //->groupBy('nombre_reviewer')
                ->orderBy('created_at', 'desc')
                ->paginate($division);
        
        
        return $reviews;
    }

    //Entrega el detalle de la provincia
    public function getAtraccionDetails($id_atraccion) {


        $atraccion = DB::table('usuario_servicios')
                ->where('id', '=', $id_atraccion)
                ->select('usuario_servicios.*')
                ->first();
        return $atraccion;
    }

    //Entrega el detalle de la provincia
    public function getCatalogoDetail($id_catalogo) {


        $catalogo = DB::table('catalogo_servicios')
                ->where('id_catalogo_servicios', '=', $id_catalogo)
                ->select('catalogo_servicios.*')
                ->first();
        return $catalogo;
    }

//Entrega el arreglo de los servicios con imagenes
    public function getDetailsServiciosAtraccion($catalogo_servicios, $page_now, $page_stoped, $pagination) {

        $orderkey = "prioridad";
        $ordervalue = "desc";


        $catalogo = null;
        if ($catalogo_servicios != null) {
            $array = array();
            foreach ($catalogo_servicios as $visitado) {
                $catalogo = $visitado->id_catalogo_servicio;

                $imagenes = DB::table('images')
                        ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                        ->where('id_auxiliar', '=', $visitado->id)
                        ->where('estado_fotografia', '=', '1')
                        ->select('images.id')
                        ->orderBy('id_auxiliar', 'desc')
                        ->first();


                if ($imagenes != null) {

                    foreach ($imagenes as $imagen) {

                        $array[] = $imagen;
                    }
                }
            }
            if ($page_now != null) {

                $currentPage = ($page_now - $page_stoped);
                // You can set this to any page you want to paginate to
                // Make sure that you call the static method currentPageResolver()
                // before querying users
                Paginator::currentPageResolver(function () use ($currentPage) {
                    return $currentPage;
                });
            }

            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select(array('usuario_servicios.id as id_usr_serv', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->groupby('usuario_servicios.id')
                    ->orderBy($orderkey, $ordervalue)
                    ->paginate($pagination);
        } else {
            $imagenesF = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->leftJoin('satisfechos_usuario_servicio', 'usuario_servicios.id', '=', 'satisfechos_usuario_servicio.id_usuario_servicio')
                    ->where('estado_fotografia', '=', '1')
                    ->where('usuario_servicios.id_catalogo_servicio', '=', $catalogo)
                    ->select(array('usuario_servicios.id as id_usr_serv', 'satisfechos_usuario_servicio.id_usuario_servicio', 'usuario_servicios.*', 'images.*', DB::raw('COUNT(satisfechos_usuario_servicio.id_usuario_servicio) as satisfechos')))
                    ->groupby('usuario_servicios.id')
                    ->orderBy($orderkey, $ordervalue)
                    ->paginate($pagination);
        }

        return $imagenesF;
    }

    //Entrega el detalle del catalogo por provincia
    public function getCatalogoDetailsProvincia($catalogo, $id_catalogo, $anterior) {



        $array = array();

        if ($anterior != null) {

            foreach ($anterior as $ant) {

                $array[] = $ant->id;
            }
        }
        if ($catalogo != null) {




            $servicioCatalogo = DB::table('usuario_servicios')
                    ->where('id_catalogo_servicio', '=', $id_catalogo)
                    ->whereNotIn('usuario_servicios.id', $array)
                    ->where('estado_servicio', '=', '1')
                    ->where('usuario_servicios.id_provincia', '=', $catalogo->id_provincia)
                    ->select('usuario_servicios.*')
                    ->orderBy('usuario_servicios.prioridad')
                    ->orderBy('usuario_servicios.num_visitas')
                    ->get();
        } else {
            $servicioCatalogo = null;
        }


        return $servicioCatalogo;
    }

    //Entrega el detalle del catalogo
    public function getCatalogoDetails($id_atraccion, $id_catalogo) {


        $atraccion = DB::table('usuario_servicios')
                ->where('id', '=', $id_atraccion)
                ->where('estado_servicio', '=', '1')
                ->select('usuario_servicios.*')
                ->first();




        if ($atraccion != null) {

            if ($atraccion->id_parroquia != 0) {

                $servicioCatalogo = DB::table('usuario_servicios')
                        ->where('id_catalogo_servicio', '=', $id_catalogo)
                        ->where('estado_servicio', '=', '1')
                        ->where('usuario_servicios.id_parroquia', '=', $atraccion->id_parroquia)
                        ->select('usuario_servicios.*')
                        ->orderBy('usuario_servicios.prioridad')
                        ->orderBy('usuario_servicios.num_visitas')
                        ->get();
            } else if ($atraccion->id_parroquia == 0 && $atraccion->id_canton != 0) {
                $servicioCatalogo = DB::table('usuario_servicios')
                        ->where('id_catalogo_servicio', '=', $id_catalogo)
                        ->where('estado_servicio', '=', '1')
                        ->where('usuario_servicios.id_canton', '=', $atraccion->id_canton)
                        ->select('usuario_servicios.*')
                        ->orderBy('usuario_servicios.prioridad')
                        ->orderBy('usuario_servicios.num_visitas')
                        ->get();
            } else if ($atraccion->id_parroquia == 0 && $atraccion->id_canton == 0 && $atraccion->id_provincia != 0) {

                $servicioCatalogo = DB::table('usuario_servicios')
                        ->where('id_catalogo_servicio', '=', $id_catalogo)
                        ->where('estado_servicio', '=', '1')
                        ->where('usuario_servicios.id_provincia', '=', $atraccion->id_provincia)
                        ->select('usuario_servicios.*')
                        ->orderBy('usuario_servicios.prioridad')
                        ->orderBy('usuario_servicios.num_visitas')
                        ->get();
            } else {
                $servicioCatalogo = DB::table('usuario_servicios')
                        ->where('id_catalogo_servicio', '=', $id_catalogo)
                        ->where('estado_servicio', '=', '1')
                        ->select('usuario_servicios.*')
                        ->orderBy('usuario_servicios.prioridad')
                        ->orderBy('usuario_servicios.num_visitas')
                        ->get();
            }
        } else {
            $servicioCatalogo = DB::table('usuario_servicios')
                    ->where('id_catalogo_servicio', '=', $id_catalogo)
                    ->where('estado_servicio', '=', '1')
                    ->select('usuario_servicios.*')
                    ->orderBy('usuario_servicios.prioridad')
                    ->orderBy('usuario_servicios.num_visitas')
                    ->get();
        }


        return $servicioCatalogo;
    }

    //Entrega el detalle geografico de la atraccion
    public function getUbicacionAtraccion($id_ubicacion) {


        $ubicacion = DB::table('ubicacion_geografica')
                ->where('id', '=', $id_ubicacion)
                ->select('ubicacion_geografica.nombre')
                ->first();
        return $ubicacion;
    }

//Entrega el detalle de la region
    public function getRegionDetails($id_region) {

          $provincias = DB::table('ubicacion_geografica')
                ->join('usuario_servicios','usuario_servicios.id_provincia', '=', 'ubicacion_geografica.id')
                ->where('id_region', '=', $id_region)
                ->select('ubicacion_geografica.*')
                ->get();
        return $provincias;
    }

//Entrega las ciudades de la provincia
    public function getCiudades($id_provincia) {

        $ciudades = DB::table('ubicacion_geografica')
                ->where('idUbicacionGeograficaPadre', '=', $id_provincia)
                ->select('ubicacion_geografica.*')
                ->get();
        return $ciudades;
    }

    
    //Entrega los sitios o atracciones por provincia
    public function getExplorerbyCatalogo($id_catalogo) {

        $explore = DB::table('catalogo_servicios')
                ->join('catalogo_servicio_establecimiento', 'catalogo_servicios.id_catalogo_servicios', '=', 'catalogo_servicio_establecimiento.id_catalogo_servicio')
                ->distinct()->select('catalogo_servicio_establecimiento.nombre_servicio_est', 'catalogo_servicio_establecimiento.url_image','catalogo_servicio_establecimiento.id')
                ->where('catalogo_servicio_establecimiento.id_catalogo_servicio', '=', $id_catalogo)
                
                ->get();
        return $explore;
    }
    
//Entrega los sitios o atracciones por provincia
    public function getExplorer($id_provincia) {

        $explore = DB::table('usuario_servicios')
                ->join('servicio_establecimiento_usuario', 'id_usuario_servicio', '=', 'usuario_servicios.id')
                ->join('catalogo_servicio_establecimiento', 'servicio_establecimiento_usuario.id_servicio_est', '=', 'catalogo_servicio_establecimiento.id')
                ->distinct()->select('catalogo_servicio_establecimiento.nombre_servicio_est', 'catalogo_servicio_establecimiento.url_image')
                ->where('servicio_establecimiento_usuario.id_usuario_servicio', '=', $id_provincia)
                ->where('estado_servicio', '=', 1)
                ->where('estado_servicio_usuario', '=', 1)
                ->where('estado_servicio_est', '=', 1)
                ->get();
        return $explore;
    }

//Entrega los eventos de la provincia
    public function getEventosProvincia($id_provincia) {

        $ciudades = DB::table('ubicacion_geografica')
                ->where('idUbicacionGeograficaPadre', '=', $id_provincia)
                ->select('ubicacion_geografica.*')
                ->get();
        return $ciudades;
    }

//Entrega el arreglo de Imagenes por provincia
    public function getImageporProvincia($id_provincia) {

        $imagenes = DB::table('images')
                ->where('id_auxiliar', '=', $id_provincia)
                ->where('estado_fotografia', '=', '1')
                ->select('images.*')
                ->get();


        return $imagenes;
    }

    //Entrega el arreglo de Imagenes por atraccion
    public function getAtraccionImages($id) {

        $imagenes = DB::table('images')
                ->where('id_auxiliar', '=', $id)
                ->where('estado_fotografia', '=', '1')
                ->where('id_catalogo_fotografia', '=', '1')
                ->select('images.*')
                ->get();


        return $imagenes;
    }

    public function getEventosImagenAtraccion($eventos) {

        $final_imagen = array();
        foreach ($eventos as $evento) {

            $imagenes = DB::table('images')
                    ->where('id_auxiliar', '=', $evento->id)
                    ->where('estado_fotografia', '=', '1')
                    ->where('id_catalogo_fotografia', '=', '4')
                    ->first();

            if ($imagenes != null) {


                $final_imagen[] = $imagenes->id;
            }
        }
        $imagenesf = DB::table('images')
                ->whereIn('images.id', $final_imagen)
                ->where('estado_fotografia', '=', '1')
                ->where('id_catalogo_fotografia', '=', '4')
                ->select('images.*')
                ->get();


        return $imagenesf;
    }

    public function getPromotionsImagenAtraccion($promos) {

        $final_imagen = array();
        foreach ($promos as $promo) {

            $imagenes = DB::table('images')
                    ->where('id_auxiliar', '=', $promo->id)
                    ->where('estado_fotografia', '=', '1')
                    ->where('id_catalogo_fotografia', '=', '2')
                    ->first();

            if ($imagenes != null) {


                $final_imagen[] = $imagenes->id;
            }
        }
        $imagenesf = DB::table('images')
                ->whereIn('images.id', $final_imagen)
                ->where('estado_fotografia', '=', '1')
                ->where('id_catalogo_fotografia', '=', '2')
                ->select('images.*')
                ->get();


        return $imagenesf;
    }

    public function getItinerImagenAtraccion($itinerarios) {

        $final_imagen = array();
        foreach ($itinerarios as $itiner) {

            $imagenes = DB::table('images')
                    ->where('id_auxiliar', '=', $itiner->id)
                    ->where('estado_fotografia', '=', '1')
                    ->where('id_catalogo_fotografia', '=', '3')
                    ->first();

            if ($imagenes != null) {


                $final_imagen[] = $imagenes->id;
            }
        }
        $imagenesf = DB::table('images')
                ->whereIn('images.id', $final_imagen)
                ->where('estado_fotografia', '=', '1')
                ->where('id_catalogo_fotografia', '=', '3')
                ->select('images.*')
                ->get();


        return $imagenesf;
    }

    public function getEventosAtraccion($id) {

        $events = DB::table('eventos_usuario_servicios')
                ->where('id_usuario_servicio', '=', $id)
                ->where('estado_evento', '=', '1')
                ->where('fecha_hasta', '>=', "'" . Carbon::now() . "'")
                ->select('eventos_usuario_servicios.*')
                ->get();


        return $events;
    }

    public function getPromoAtraccion($id) {

        $events = DB::table('promocion_usuario_servicio')
                ->where('id_usuario_servicio', '=', $id)
                ->where('estado_promocion', '=', '1')
                ->where('fecha_hasta', '>=', "'" . Carbon::now() . "'")
                ->select('promocion_usuario_servicio.*')
                ->get();


        return $events;
    }

    public function getItinerAtraccion($id) {

        $itiner = DB::table('itinerarios_usuario_servicios')
                ->where('id_usuario_servicio', '=', $id)
                ->where('estado_itinerario', '=', '1')
                ->where('fecha_hasta', '>=', "'" . Carbon::now() . "'")
                ->select('itinerarios_usuario_servicios.*')
                ->get();


        return $itiner;
    }

}
