<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Repositories\PublicServiceRepository;

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
        $visitados = $gestion->getUsuario_serv($location);
        
        return view('public_page.front.homePage')->with('location',$location)->with('visitados',$visitados);
    }

    //Obtiene las regiones del pais
    public function getRegiones(Request $request) {
        //
        //Al momento son quemadas 4 provincias
        //$listProvincias = $gestion->getProvincias();
        // $location=file_get_contents('http://freegeoip.net/json/200.125.245.238');



        $view = View::make('public_page.partials.regiones')->with('location', $location);
        ;
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
            return $view;
    }

}
