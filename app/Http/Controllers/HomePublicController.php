<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Repositories\PublicServiceRepository;



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
        $visitados = $gestion->getUsuario_serv($location);
        $regiones = $gestion->getRegiones();
        
        
        
        return view('public_page.front.homePage')->with('location',$location)->with('visitados',$visitados)->with('regiones',$regiones);
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
        
        return view('public_page.front.detalleProvincia')->with('provincias',$provincias)->with('imagenes',$imagenes)->with('ciudades',$ciudades)->with('explore',$explore)->with('visitados',$visitados);
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
        
        
        
        return view('public_page.front.allRegions')->with('provincias',$provincias)->with('imagenes',$imagenes)->with('region',$id_region);
    }
    

}
