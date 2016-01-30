<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;


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
    public function getVisitadosProvincia($id_provincia) {

        $visitados = DB::table('usuario_servicios')
                        ->where('usuario_servicios.estado_servicio', '=', '1')
                        ->where('usuario_servicios.estado_servicio_usuario', '=', '1')
                        ->where('usuario_servicios.id_provincia', '=', $id_provincia)
                        ->select('usuario_servicios.id')
                        ->orderBy('num_visitas', 'desc')
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


}
