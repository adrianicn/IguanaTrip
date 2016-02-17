<?php

namespace App\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
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
    public function __construct() {
        
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
    public function getProvinciaIntern($id_provincia, $id_atraccion, $canton, $parroquia,$page_now, $page_stoped) {

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
                ->whereNotIn('usuario_servicios.id_canton',array($canton))
                ->whereNotIn('usuario_servicios.id_parroquia',array($parroquia))
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
                    ->whereNotIn('usuario_servicios.id_canton',array($canton))
                ->whereNotIn('usuario_servicios.id_parroquia',array($parroquia))
                    
                    ->whereNotIn('usuario_servicios.id', array($id_atraccion))
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre', 'ubicacion_geografica.nombre')
                    ->orderBy('id_auxiliar', 'desc')
                    ->paginate(3);
            
            
        } else {
            $imagenesF =null;
        }
        return $imagenesF;
        
        
        
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
                            ->where('ubicacion_geografica.nombre', 'like', '%' + substr($ubicacion->region, 0, 12) + '%')
                            ->select('ubicacion_geografica.*')->first();
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
                            ->where('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
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
            $currentPage = ($page_now - $page_stoped);
            // You can set this to any page you want to paginate to
            // Make sure that you call the static method currentPageResolver()
            // before querying users
            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });

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
                            ->where('ubicacion_geografica.nombre', 'like', '%' + substr($ubicacion->region, 0, 12) + '%')
                            ->select('ubicacion_geografica.*')->first();
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
                            ->where('usuario_servicios.id_provincia', '=', $ubicGeo->idUbicacionGeograficaPadre)
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('usuario_servicios.id_catalogo_servicio', '=', '8')
                            ->where('usuario_servicios.fecha_fin', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
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
            $currentPage = ($page_now - $page_stoped);
            // You can set this to any page you want to paginate to
            // Make sure that you call the static method currentPageResolver()
            // before querying users
            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });

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
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion->city)
                            ->select('ubicacion_geografica.*')->first();
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
        if ($ubicGeo != null) {
            $eventos = DB::table('usuario_servicios')
                            ->join('promocion_usuario_servicio', 'usuario_servicios.id', '=', 'promocion_usuario_servicio.id_usuario_servicio')
                            ->where('usuario_servicios.id_canton', '=', $ubicGeo->id)
                            ->where('usuario_servicios.estado_servicio', '=', '1')
                            ->where('promocion_usuario_servicio.estado_promocion', '=', '1')
                            ->where('promocion_usuario_servicio.fecha_hasta', '>=', "'" . Carbon::now() . "'")
                            ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                            ->select('promocion_usuario_servicio.id')
                            ->orderBy('usuario_servicios.num_visitas', 'desc')
                            ->take($take)->get();
        }

        if ($eventos != null) {
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
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion->city)
                            ->select('ubicacion_geografica.*')->first();
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
        if ($ubicGeo != null) {
            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                            ->where('usuario_servicios.id_canton', '=', $ubicGeo->id)
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
    public function getEventsIndepCity($ubicacion, $take, $pagination) {

        /* Se despliegan los eventos, promociones e itinerarios de los alrededores de la ubicación establecida

         * Eventos o Actividades: son los eventos macro independientes de la tabla usuario_servicio catalogo 5
         * Eventos dependientes: son los eventos dependientes de un usuario_ servicio tabla eventos
         * Promociones: promociones dependientes del usuario_ servicio
         * Itinerarios: Igual
         *          */


        if ($ubicacion != "") {

            $ubicGeo = DB::table('ubicacion_geografica')
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion->city)
                            ->select('ubicacion_geografica.*')->first();
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
        if ($ubicGeo != null) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.id_canton', '=', $ubicGeo->id)
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





            $imagenes = DB::table('images')
                    ->join('usuario_servicios', 'usuario_servicios.id', '=', 'images.id_usuario_servicio')
                    ->join('catalogo_servicios', 'usuario_servicios.id_catalogo_servicio', '=', 'catalogo_servicios.id_catalogo_servicios')
                    ->whereIn('images.id', $array)
                    ->where('estado_fotografia', '=', '1')
                    ->select('usuario_servicios.*', 'images.*', 'catalogo_servicios.nombre_servicio as catalogo_nombre')
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
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion->city)
                            ->select('ubicacion_geografica.*')->first();
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
        if ($ubicGeo != null) {


            $eventos = DB::table('usuario_servicios')
                            ->join('eventos_usuario_servicios', 'usuario_servicios.id', '=', 'eventos_usuario_servicios.id_usuario_servicio')
                            ->where('usuario_servicios.id_canton', '=', $ubicGeo->id)
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
                            ->where('ubicacion_geografica.nombre', '=', $ubicacion->city)
                            ->select('ubicacion_geografica.*')->first();
        }
        ///Si la $ubicacion es null
        else {
            return null;
        }
        if ($ubicGeo != null) {
            $eventos = DB::table('usuario_servicios')
                            ->where('usuario_servicios.id_canton', '=', $ubicGeo->id)
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

    //Obtiene las top n places de cada provincia
    public function getTopPlaces($n) {

//array de las regiones del ecuador
//1: Costa
//2: Sierra
//3:Oriente
//4:Galapagos

        $array = array(1, 2, 3, 4);

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
                ->paginate(5);

        return $imagenesF;
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
                            ->where('id_auxiliar', '=', $provincia->id)
                            ->where('estado_fotografia', '=', '1')
                            ->select('images.id')->take(3)->get();

            if ($id_imagenes != null) {
                foreach ($id_imagenes as $imagen) {

                    $final_imagen[] = $imagen->id;
                }
            }
        }

        $imagenes = DB::table('images')
                ->join('ubicacion_geografica', 'ubicacion_geografica.id', '=', 'images.id_auxiliar')
                ->whereIn('images.id', $final_imagen)
                ->where('estado_fotografia', '=', '1')
                ->select('images.*', 'ubicacion_geografica.nombre', 'ubicacion_geografica.id as id_geo', 'ubicacion_geografica.id_region')
                ->get();


        return $imagenes;
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
                ->where('id_region', '=', $id_region)
                ->select('ubicacion_geografica.id')
                ->get();


        foreach ($provincias as $provincia) {
            $id_imagenes = DB::table('images')
                            ->where('id_auxiliar', '=', $provincia->id)
                            ->where('estado_fotografia', '=', '1')
                            ->select('images.id')->take(1)->get();

            if ($id_imagenes != null) {
                foreach ($id_imagenes as $imagen) {

                    $final_imagen[] = $imagen->id;
                }
            }
        }

        $imagenes = DB::table('images')
                ->join('ubicacion_geografica', 'ubicacion_geografica.id', '=', 'images.id_auxiliar')
                ->whereIn('images.id', $final_imagen)
                ->where('estado_fotografia', '=', '1')
                ->select('images.*', 'ubicacion_geografica.nombre', 'ubicacion_geografica.id as id_geo', 'ubicacion_geografica.id_region', 'ubicacion_geografica.descripcion_esp', 'ubicacion_geografica.descripcion_eng')
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

    //Entrega el detalle de la provincia
    public function getAtraccionDetails($id_atraccion) {


        $provincias = DB::table('usuario_servicios')
                ->where('id', '=', $id_atraccion)
                ->select('usuario_servicios.*')
                ->first();
        return $provincias;
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
    public function getExplorer($id_provincia) {

        $explore = DB::table('usuario_servicios')
                ->join('servicio_establecimiento_usuario', 'id_usuario_servicio', '=', 'usuario_servicios.id')
                ->join('catalogo_servicio_establecimiento', 'servicio_establecimiento_usuario.id_servicio_est', '=', 'catalogo_servicio_establecimiento.id')
                ->distinct()->select('catalogo_servicio_establecimiento.nombre_servicio_est', 'catalogo_servicio_establecimiento.url_image')
                ->where('catalogo_especifico', '=', 0)
                ->where('id_provincia', '=', $id_provincia)
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
                ->where('fecha_desde', '<=', "'" . Carbon::now() . "'")
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
