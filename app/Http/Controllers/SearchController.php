<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Repositories\PublicServiceRepository;
use Input;
use Validator;
use Jenssegers\Agent\Agent;
use App\Jobs\VerifyReview;
use Illuminate\Support\Facades\Session;
use App\Models\Review_Usuario_Servicio;

class SearchController extends Controller {

  

    
    //Obtiene los top places paginados
    public function getSearchTotal(Request $request, PublicServiceRepository $gestion) {
         $servicios = $gestion->getServiciosAll();
       
        
        $view = View::make('public_page.front.searchTotal', array(
            
            'servicios'=> $servicios
            
                
                
                ));
        if ($request->ajax()) {
            $sections = $view->rendersections();
            return Response::json($sections);
        }
        else{
            
            
        return $view;}
        
    }
    
    //Obtiene los terminos y condiciones
    public function getTermsConditions() {
         
       
        
        $view = View::make('public_page.general.termsConditions');
        
            
        return $view;
        
    }
    
    public function getTotalSearchInside(Request $request, PublicServiceRepository $gestion, $term) {
        //

         $busquedaTotal = $gestion->getSearchTotal($term);
     
        $despliegue=null;
         if($busquedaTotal!=null)
         {
             
             $despliegue = $gestion->getDespliegueBusqueda($busquedaTotal,10,4);
         }
        
        

        $view = View::make('public_page.partials.searchTotalPartial', 
                array('despliegue' => $despliegue));

        if ($request->ajax()) {
            //return Response::json(View::make('public_page.partials.AllTopPlaces', array('topPlacesEcuador' => $topPlacesEcuador))->rendersections());
            $sections = $view->rendersections();
            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        }
    }

    
    

    public function postLikesS(Request $request, PublicServiceRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $ip = $this->getIp();
        $likesIP = $gestion->getlikesIp($formFields['ids'], $ip);

        if (count($likesIP) == 0 || $likesIP == null) {
            $gestion->storeLikes($formFields['ids'], $ip);
        }


        //obtengo los servicios ya almacenados de la bdd

        return response()->json(array('success' => true));
    }

}
