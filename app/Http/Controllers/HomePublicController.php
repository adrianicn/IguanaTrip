<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Repositories\PublicServiceRepository;
use Input;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Session;

class HomePublicController extends Controller {

    private function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome(PublicServiceRepository $gestion) {
        //
        try {
            $ipUser = $this->getIp();
            $location = json_decode(file_get_contents("http://ipinfo.io/200.125.245.238"));
        } catch (Exception $e) {
            $location = "";
        }



        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);
        //$visitados = $gestion->getUsuario_serv($location);
        //  $regiones = $gestion->getRegiones();

        $topPlacesEcuador = $gestion->getTopPlaces(3);


        return view('public_page.front.homePage')->with('location', $location)->with('topPlacesEcuador', $topPlacesEcuador);
        //->with('visitados',$visitados)
    }

    //Obtiene los top places paginados
    public function getTopPlaces(Request $request, PublicServiceRepository $gestion) {
        //
        $topPlacesEcuador = $gestion->getTopPlaces(100);

        $view = View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene los top places paginados
    public function getCercanosIntern(Request $request, PublicServiceRepository $gestion, $id_atraccion, $id_provincia, $id_canton, $id_parroquia) {
        //
        //saber cuales son los hijos de la atraccion principal si lo tiene
        //$related = $gestion->getHijosAtraccion($id_atraccion);


        $provincias = null;
        $canton = null;
        $parroquia = null;
        $evntParroquia = null;
        $prmoParroquia = null;
        $evntCanton = null;
        $prmoCanton = null;
        $evntProvincia = null;
        $prmoProvincia = null;


        if ($id_parroquia != 0) {
            $parroquia = $gestion->getParroquiaIntern($id_parroquia, $id_atraccion);

            if ($parroquia != null) {
                $evntParroquia = $gestion->getEventIntern($parroquia);
                $prmoParroquia = $gestion->getPromoIntern($parroquia);
            }
        }
        if ($id_canton != 0) {
            if ($parroquia != null) {
                if (Input::get('page') > $parroquia->currentPage()) {
                    $canton = $gestion->getCantonIntern($id_canton, $id_atraccion, $id_parroquia, Input::get('page'), $parroquia->currentPage());
                }
            } else {
                $canton = $gestion->getCantonIntern($id_canton, $id_atraccion, $id_parroquia, null, null);
            }
              if ($canton != null) {
                    $evntCanton = $gestion->getEventIntern($canton);
                    $prmoCanton = $gestion->getPromoIntern($canton);
                }
        }

        if ($id_provincia != 0) {
            
             if ($canton != null) {
                 if($parroquia!=null)
                 
                 {$page=$canton->currentPage()+$parroquia->currentPage();
                 $stop=$parroquia->currentPage();
                 }
                 
                 else
                 {$page=$canton->currentPage();
                 $stop=$canton->currentPage();
                 }
                 
                if (Input::get('page') > ($page)) {
                    $provincias = $gestion->getProvinciaIntern($id_provincia, $id_atraccion,$id_canton, $id_parroquia, Input::get('page'), $stop);
                }
            } else {
                $provincias = $gestion->getProvinciaIntern($id_provincia, $id_atraccion,$id_canton, $id_parroquia,null, null);
            }
            
             if ($provincias != null) {
                    $evntProvincia = $gestion->getEventIntern($provincias);
                    
                    $prmoProvincia = $gestion->getPromoIntern($provincias);
                }
            
        }

        $view = View::make('public_page.partials.cercanosIntern', array('parroquia' => $parroquia,
                    'evntParroquia' => $evntParroquia,
                    'prmoParroquia' => $prmoParroquia,
                    'canton' => $canton,
                    'provincias' => $provincias,
                    'evntCanton' => $evntCanton,
                    'prmoCanton' => $prmoCanton,
                    'evntProvincia' => $evntProvincia,
                    'prmoProvincia' => $prmoProvincia,
        ));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());


            $sections = $view->rendersections();
            return Response::json($sections);

            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene los top places paginados
    public function getcloseToMe(Request $request, PublicServiceRepository $gestion) {
        //

        try {
            $ipUser = $this->getIp();
            $location = json_decode(file_get_contents("http://ipinfo.io/186.47.241.78"));
        } catch (Exception $e) {
            $location = "";
        }


        $eventosCloseProv = null;
        $eventosDepCloseProv = null;
        $eventosClose = $gestion->getEventsIndepCity($location, 100, 1); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);
        $eventosDepClose = $gestion->getEventsDepCity($location, 100, 1); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);
        $PromoDepClose = $gestion->getPromoDepCity($location, 100, 1); //$eventosClose = $gestion->getEventsIndepCity(ciudad,take,pagination);


        if (Input::get('page') > $eventosClose->currentPage()) {
            $eventosCloseProv = $gestion->getEventsIndepProvince($location, Input::get('page'), $eventosClose->currentPage(), 100, 1);
        }

        if (Input::get('page') > $eventosDepClose->currentPage()) {
            $eventosDepCloseProv = $gestion->getEventsDepProvince($location, Input::get('page'), $eventosDepClose->currentPage(), 100, 1);
        }

        $view = View::make('public_page.partials.closeToMe', array('eventosClose' => $eventosClose, 'eventosCloseProv' => $eventosCloseProv, 'eventosDepClose' => $eventosDepClose, 'eventosDepCloseProv' => $eventosDepCloseProv, 'PromoDepClose' => $PromoDepClose));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());


            $sections = $view->rendersections();
            return Response::json($sections);

            //return  Response::json($sections['contentPanel']); 
        }
    }

    //Obtiene las regiones del pais
    public function getRegiones(Request $request) {
        //
        //Al momento son quemadas 4 provincias
        //$listProvincias = $gestion->getProvincias();
        // $location=file_get_contents('http://freegeoip.net/json/200.125.245.238');

        $view = View::make('public_page.partials.regiones')->with('location', $location);

        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
            return $view;
    }

    //Obtiene las descripcion de la provincia elegida
    public function getProvinciaDescripcion($id_provincia, $id_image, PublicServiceRepository $gestion) {
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);
        $provincias = $gestion->getProvinciaDetails($id_provincia);
        $imagenes = $gestion->getImageporProvincia($id_provincia);
        $ciudades = $gestion->getCiudades($id_provincia);
        $visitados = $gestion->getVisitadosProvincia($id_provincia);

        // $eventosProvincia = $gestion->getEventosProvincia($id_provincia);
        $explore = $gestion->getExplorer($id_provincia);

        return view('public_page.front.detalleProvincia')->with('provincias', $provincias)->with('imagenes', $imagenes)->with('ciudades', $ciudades)->with('explore', $explore)->with('visitados', $visitados);
    }

    //Obtiene las descripcion de la atraccion elegida
    public function getAtraccionDescripcion($id_atraccion, PublicServiceRepository $gestion) {
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);
        $Imgeventos = null;
        $ImgPromociones = null;
        $ImgItiner = null;
        $explore = null;
        $visitados = null;

        $provincia = null;
        $canton = null;
        $parroquia = null;

        $atraccion = $gestion->getAtraccionDetails($id_atraccion);
        $imagenes = $gestion->getAtraccionImages($id_atraccion);
        $eventos = $gestion->getEventosAtraccion($id_atraccion);
        $promociones = $gestion->getPromoAtraccion($id_atraccion);
        $itinerarios = $gestion->getItinerAtraccion($id_atraccion);
        $related = $gestion->getHijosAtraccion($id_atraccion);



        if ($atraccion->id_provincia != 0)
            $provincia = $gestion->getUbicacionAtraccion($atraccion->id_provincia);

        if ($atraccion->id_canton != 0)
            $canton = $gestion->getUbicacionAtraccion($atraccion->id_canton);

        if ($atraccion->id_parroquia != 0)
            $parroqia = $gestion->getUbicacionAtraccion($atraccion->id_parroquia);

        if ($related == null)
            $visitados = $gestion->getVisitadosProvincia($atraccion->id_provincia);

        if ($eventos != null)
            $Imgeventos = $gestion->getEventosImagenAtraccion($eventos);

        if ($promociones != null)
            $ImgPromociones = $gestion->getPromotionsImagenAtraccion($promociones);


        if ($itinerarios != null)
            $ImgItiner = $gestion->getItinerImagenAtraccion($itinerarios);


        if (isset($atraccion->id_provincia))
            $explore = $gestion->getExplorer($atraccion->id_provincia);


        return view('public_page.front.detalleAtracciones')->with('atraccion', $atraccion)
                        ->with('imagenes', $imagenes)->with('explore', $explore)
                        ->with('eventos', $eventos)->with('Imgeventos', $Imgeventos)
                        ->with('promociones', $promociones)
                        ->with('ImgPromociones', $ImgPromociones)
                        ->with('itinerarios', $itinerarios)
                        ->with('ImgItiner', $ImgItiner)
                        ->with('related', $related)
                        ->with('visitados', $visitados)
                        ->with('canton', $canton)
                        ->with('provincia', $provincia)
                        ->with('parroquia', $parroquia)
        ;
    }

    //Obtiene todas las provincias de la region
    public function getRegionsId($id_region, PublicServiceRepository $gestion) {
        $agent = new Agent();

        $desk = $device = $agent->isMobile();
        if ($desk == 1)
            $desk = "mobile";
        else {
            $desk = "desk";
        }

        Session::put('device', $desk);
        $provincias = $gestion->getRegionDetails($id_region);
        $imagenes = $gestion->getImageporRegion($id_region);



        return view('public_page.front.allRegions')->with('provincias', $provincias)->with('imagenes', $imagenes)->with('region', $id_region);
    }

}
