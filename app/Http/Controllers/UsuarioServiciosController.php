<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ServiciosOperadorRepository;
use Validator;
use Input;
use App\Models\Usuario_Servicio;
use App\Models\Promocion_Usuario_Servicio;
use App\Models\Itinerario_Usuario_Servicio;
use App\Models\Detalle_Itinerario;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class UsuarioServiciosController extends Controller {

    /**
     * Create a new AdminController instance.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @return void
     */
    protected $validationRules = [

        'id_usuario_op' => 'required'
            //,'id_catalogo_servicio' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tablaServicios($id_usuario_op, ServiciosOperadorRepository $gestion) {
        //

        $listServiciosUnicos = $gestion->getServiciosOperadorUnicos($id_usuario_op);
        $listServiciosAll = $gestion->getServiciosOperadorAll($id_usuario_op);
        return view('Registro.listaServiciosUsuario', compact('listServiciosUnicos', 'listServiciosAll'));
    }

    /**
     * Despliega los servicios por operador
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getServiciosOperador($id_usuario_op, ServiciosOperadorRepository $gestion) {
        //

        $data['id_usuario_op'] = $id_usuario_op;

        //logica que comprueba si el usuario tiene servicios para ser modificados
        //caso contrario ingresa nuevos serviciosS
        $listServicios = $gestion->getServiciosOperador($id_usuario_op);

        $view = view('Registro.catalogoServicio', compact('data', 'listServicios'));
        return ($view);
    }

    public function getTipoDificultad(Request $request, ServiciosOperadorRepository $gestion) {
        //
        //logica que comprueba si el usuario tiene servicios para ser modificados
        //caso contrario ingresa nuevos serviciosS
        $listServicios = $gestion->getCatalogoDificultad();
        $view = View::make('reusable.catalogo_dificultades')->with('diffic', $listServicios);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
            return $view;
    }

    /**
     * Despliega los servicios por operador
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RenderPartial($id_partial) {
        //
        //$html = View::make($id_partial, compact('data'))->render();

        $html = (String) view($id_partial);




        return response()->json(['newHtml' => $html]);
    }

    /**
     * Guarda los servicios que presta un usuario o un operador.
     *
     * @return Response
     */
    public function postServicioOperadores(ServiciosOperadorRepository $gestion) {



        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $root_array1['id_usuario_op'] = $formFields['id_usuario_op'];
        $validator = Validator::make($root_array1, $this->validationRules);
        $serviciosBase = array();
        $root_array = array();

        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        }

        //obtengo los servicios ya almacenados de la bdd

        $ServiciosOperador = $gestion->getServiciosOperador($formFields['id_usuario_op']);

        //Arreglo de servicios prestados que vienen del formulario
        foreach ($formFields as $key => $value) {
            //verifica si el arreglo de parametros es un catalogo
            if (strpos($key, 'id_catalogo_servicio') !== false) {
                $root_array[$key] = $value;
            }
        }

        //pongo en formato el arreglo que viene de la bdd
        $ix = 0;
        foreach ($ServiciosOperador as $servicioBase) {

            $ix = $ix + 1;
            $serviciosBase[$ix] = $servicioBase->id_catalogo_servicio;
        }

        $local = $root_array;
        $base = $serviciosBase;

        //es lo nuevo que viene del formulario
        $resultlocalbase = array_diff($local, $base);

        //es lo que tengo q eliminar o cabiar de estado
        $resultbaselocal = array_diff($base, $local);

//return $resultbaselocal;
        //Guarda los nuevos catalogos
        if (count($resultlocalbase) > 0) {


            foreach ($resultlocalbase as $key1 => $value1) {
                $save_array = array();
                $save_array['id_usuario_op'] = $formFields['id_usuario_op'];
                $save_array['id_catalogo_servicio'] = $value1;

                $Servicio = $gestion->getServiciosOperadorporIdServicio($formFields['id_usuario_op'], $value1);
                //significa que ya existia y que hay que cambiarle el estado a 1 para volver a activarlo
                if (count($Servicio) > 0) {

                    $save_array['estado_servicio'] = 1;
                    $gestion->storeUpdate($save_array, $Servicio);
                }
                //significa que es un nuevo servicio y se agrega como insert
                else {

                    $gestion->storeNew($save_array);
                }
            }
        }


        //actualiza estado 0 los que ya estaba guardados
        if (count($resultbaselocal) > 0) {

            foreach ($resultbaselocal as $key1 => $value1) {
                $save_array = array();

                $Servicio = $gestion->getServiciosOperadorporIdServicio($formFields['id_usuario_op'], $value1);
                $save_array['estado_servicio'] = 0;
                $gestion->storeUpdate($save_array, $Servicio);
            }
        }


        $returnHTML = ('/IguanaTrip/public/detalleServicios/' . $formFields['id_usuario_op']);
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  App\Http\Requests\RegisterRequest  $request
     * @param  App\Repositories\UserRepository $user_gestion
     * @return Response
     */
    public function postDetalle(ServiciosOperadorRepository $gestion) {



        $inputData = Input::get('formData');

        parse_str($inputData, $formFields);
        //Arreglo de servicios prestados que vienen del formulario
        //Arreglo de servicios prestados que vienen del formulario
        foreach ($formFields as $key => $value) {
            //verifica si el arreglo de parametros es un catalogo
            $root_array[$key] = $value;
        }
        $idServicio = $root_array['ids'];
        $Servicio = $gestion->getServiciosOperadorporIdUsuarioServicio($idServicio);

        $name = 'estado_servicio_usuario_' . $idServicio;
        if (isset($root_array[$name])) {
            if ($root_array[$name] == 'on')
                $save_array['estado_servicio_usuario'] = 1;
        } else
            $save_array['estado_servicio_usuario'] = 0;


        $gestion->storeUpdateEstado($save_array, $Servicio);


        //$this->dispatch(new SendMail($user));
        //    return redirect('/')->with('ok', trans('front/verify.message'));
        //return redirect('/auth/confirmation/'.$confirmation_code);*/

        return response()->json(array(
                    'success' => true,
                    'message' => trans('front/verify.message')
        ));
        //}
    }

    /**
     * Guarda las promocionses que presta un usuario o un operador.
     *
     * @return Response
     */
    public function postPromocion(ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $validator = Validator::make($formFields, Promocion_Usuario_Servicio::$rulesP);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        }

        //obtengo llas promociones por id
        if (isset($formFields['id'])) {
            $Promocion = $gestion->getPromocion($formFields['id']);
        }
//si ya existe el objeto se hace el update
        if (isset($Promocion)) {
            //logica update

            $gestion->storeUpdatePromocion($formFields, $Promocion);
        } else { //logica de insert
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewPromocion($formFields);
            $returnHTML = ('/IguanaTrip/public/promocion/' . $object->id);
        }




        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    /**
     * Despliega las promociones por operador
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPromociones($id_promocion, ServiciosOperadorRepository $gestion) {
        //

        $data['id'] = $id_promocion;

        //logica que comprueba si el usuario tiene promociones para ser modificados

        $listPromociones = $gestion->getPromocionesOperador($id_promocion);

        //imagenes de la promocion
        $ImgPromociones = $gestion->getImagePromocionesOperador($id_promocion);

        $view = view('Registro.editPromocion', compact('ImgPromociones', 'listPromociones'));
        return ($view);
    }

    public function getItinerarios($id, ServiciosOperadorRepository $gestion) {
        //

        $data['id'] = $id;

        //logica que comprueba si el usuario tiene promociones para ser modificados

        $listItinerarios = $gestion->getItinerariosUsuario($id);

        //imagenes de la promocion
        $ImgItinerarios = $gestion->getImageItinerarioOperador($id);

        $view = view('Registro.editItinerario', compact('ImgItinerarios', 'listItinerarios'));
        return ($view);
    }
    
    
    
    //Obtiene la lista de detalles de itinerarios por id itinerario
    public function getListaItinerarios($id, Request $request,ServiciosOperadorRepository $gestion) {
        //

       //
        //logica que comprueba si el usuario tiene servicios para ser modificados
        //caso contrario ingresa nuevos serviciosS
       $listItinerarios = $gestion->getItinerariosDetalle($id);
       $id_itinerario=$id;

        $view = View::make('reusable.listaItinerarios')->with('listItinerarios', $listItinerarios)->with('id_itinerario',$id_itinerario);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
            return $view;
    }
    
    
    
    

    /**
     * Guarda los itinerarios que presta un usuario o un operador.
     *
     * @return Response
     */
    public function postItinerario(ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $validator = Validator::make($formFields, Itinerario_Usuario_Servicio::$rulesP);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        }

        //obtengo llas promociones por id
        if (isset($formFields['id'])) {
            $Itinerario = $gestion->getItinerario($formFields['id']);
        }
         //si ya existe el objeto se hace el update
        if (isset($Itinerario)) {
            //logica update

            $gestion->storeUpdatePromocion($formFields, $Itinerario);
        } else { //logica de insert
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewItinerario($formFields);
            $returnHTML = ('/IguanaTrip/public/itinerario/' . $object->id);
        }




        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    public function postPuntoItinerario(ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $validator = Validator::make($formFields, Detalle_Itinerario::$rulesP);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        }

        //obtengo llas promociones por id
        if (isset($formFields['id'])) {
            $Itinerario = $gestion->getItinerario($formFields['id']);
        }
//si ya existe el objeto se hace el update
        if (isset($Itinerario)) {
            //logica update

            $gestion->storeUpdatePromocion($formFields, $Promocion);
        } else { //logica de insert
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewDetalleItinerario($formFields);
            $returnHTML = ('/IguanaTrip/public/itinerario/' . $formFields['id_itinerario']);
            
      /*  $view = View::make('reusable.catalogo_dificultades')->with('diffic', $listServicios);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
            return $view;
        }*/




        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    }
}
