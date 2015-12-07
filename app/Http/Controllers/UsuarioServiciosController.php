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
use App\Models\Eventos_usuario_Servicio;
use App\Models\Detalle_Itinerario;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Models\Invitaciones_Amigos;
use App\Jobs\InviteFriendsMail;
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
    public function tablaServicios(ServiciosOperadorRepository $gestion) {
        //

        $listServiciosUnicos = $gestion->getServiciosOperadorUnicos(session('operador_id'));
        $listServiciosAll = $gestion->getServiciosOperadorAll(session('operador_id'));
        return view('Registro.listaServiciosUsuario', compact('listServiciosUnicos', 'listServiciosAll'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEventos($id, ServiciosOperadorRepository $gestion) {
        //

        $validacion = $gestion->getPermisoEvento($id);
        if (isset($validacion))
            $permiso = $gestion->getPermiso($validacion->id_usuario_servicio);
        else
            return view('errors.404');

        if (!isset($permiso) || $permiso->id_usuario != session('user_id')) {


            return view('errors.404');
        }

        $listEventos = $gestion->getEventosporId($id);
        $ImgPromociones = $gestion->getImageOperador($id, 4);

        return view('Registro.editEvento', compact('listEventos', 'ImgPromociones'));
    }

    /**
     * Despliega los servicios por operador
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getServiciosOperador(ServiciosOperadorRepository $gestion) {
        //

        $data['id_usuario_op'] = session('operador_id');

        //logica que comprueba si el usuario tiene servicios para ser modificados
        //caso contrario ingresa nuevos serviciosS
        $listServicios = $gestion->getServiciosOperador(session('operador_id'));

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
        $html = (String) view($id_partial);
        return response()->json(['newHtml' => $html]);
    }

    //Renderiza el parcial con datos si es necesario
    public function RenderPartialWithData(Request $request, $id_partia, $id_data, ServiciosOperadorRepository $gestion) {
        //

        $listItinerarios = $gestion->getDetalleItinerario($id_data);

        $view = View::make($id_partia, array('listItinerarios' => $listItinerarios));

        //  $view = View::make($id_partia)->with('listItinerarios', $listItinerarios);
        if ($request->ajax()) {
            $sections = $view->render();
            return response()->json(['newHtml' => $sections]);
        } else
            return $view;
    }

    //actualiza el estado de las promociones
    public function postEstadoEvento($id, ServiciosOperadorRepository $gestion) {



        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $serviciosBase = array();
        //obtengo los servicios ya almacenados de la bdd
        $ServiciosOperador = $gestion->getEstadoEvento($id);

        foreach ($ServiciosOperador as $servicioBase) {


            if ($servicioBase->estado_evento == 1)
                $serviciosBase['estado_evento'] = 0;
            else
                $serviciosBase['estado_evento'] = 1;

            $serviciosBase['id'] = $servicioBase->id;
        }


        $gestion->storeUpdateEstadoEvento($serviciosBase, $ServiciosOperador);
        return response()->json(array('success' => true));
    }
    
    
    
    //actualiza el estado de las promociones
    public function postEstadoPromocion($id, ServiciosOperadorRepository $gestion) {



        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $serviciosBase = array();
        //obtengo los servicios ya almacenados de la bdd
        $ServiciosOperador = $gestion->getEstadoPromocion($id);

        foreach ($ServiciosOperador as $servicioBase) {


            if ($servicioBase->estado_promocion == 1)
                $serviciosBase['estado_promocion'] = 0;
            else
                $serviciosBase['estado_promocion'] = 1;

            $serviciosBase['id'] = $servicioBase->id;
        }


        $gestion->storeUpdateEstadoPromocion($serviciosBase, $ServiciosOperador);
        return response()->json(array('success' => true));
    }

    //actualiza el estado del itinerario
    public function postEstadoItinerario($id, ServiciosOperadorRepository $gestion) {



        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $serviciosBase = array();
        //obtengo los servicios ya almacenados de la bdd
        $ServiciosOperador = $gestion->getEstadoItiner($id);

        foreach ($ServiciosOperador as $servicioBase) {


            if ($servicioBase->estado_itinerario == 1)
                $serviciosBase['estado_itinerario'] = 0;
            else
                $serviciosBase['estado_itinerario'] = 1;

            $serviciosBase['id'] = $servicioBase->id;
        }


        $gestion->storeUpdateEstadoItinerarioPrincipal($serviciosBase, $ServiciosOperador);
        return response()->json(array('success' => true));
    }

    //actualiza el estado del detalleitinerario
    public function postEstadoDetalleItinerario($id, ServiciosOperadorRepository $gestion) {



        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        $serviciosBase = array();
        //obtengo los servicios ya almacenados de la bdd
        $ServiciosOperador = $gestion->getEstadoDetalleItiner($id);

        foreach ($ServiciosOperador as $servicioBase) {


            if ($servicioBase->estado_punto == 1)
                $serviciosBase['estado_punto'] = 0;
            else
                $serviciosBase['estado_punto'] = 1;

            $serviciosBase['id'] = $servicioBase->id;
        }


        $gestion->storeUpdateEstadoItinerario($serviciosBase, $ServiciosOperador);
        return response()->json(array('success' => true));
    }

    /**
     * Guarda los servicios que presta un usuario o un operador.
     *
     * @return Response
     */
    public function postServicioOperadores(ServiciosOperadorRepository $gestion) {



        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $root_array1['id_usuario_op'] = session('operador_id');
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

        $ServiciosOperador = $gestion->getServiciosOperador(session('operador_id'));

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
                $save_array['id_usuario_op'] = session('operador_id');
                $save_array['id_catalogo_servicio'] = $value1;

                $Servicio = $gestion->getServiciosOperadorporIdServicio(session('operador_id'), $value1);
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

                $Servicio = $gestion->getServiciosOperadorporIdServicio(session('operador_id'), $value1);
                $save_array['estado_servicio'] = 0;
                $gestion->storeUpdate($save_array, $Servicio);
            }
        }


        $returnHTML = ('/IguanaTrip/public/detalleServicios');
        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    
    
    
        public function postInvitarAmigo(ServiciosOperadorRepository $gestion) {



        $inputData = Input::get('formData');

        parse_str($inputData, $formFields);
        
         $validator = Validator::make($formFields, Invitaciones_Amigos::$rulesP);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        }
        
        $object = $gestion->storeNewInviarAmigo($formFields);
        $this->dispatch(new InviteFriendsMail($object));

        return response()->json(array(
                    'success' => true,
                    'message' => trans('front/verify.message')
        ));
        //}
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

        //usuario_servicio_id
        $permiso = $gestion->getPermiso($formFields['id_usuario_servicio']);


        if (!isset($permiso) || $permiso->id_usuario != session('user_id')) {


            return view('errors.404');
        }


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
            return response()->json(array('success' => true, 'redirectto' => $returnHTML));
        }




        return response()->json(array('success' => true));
    }

    /**
     * Despliega las promociones por operador
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPromociones($id_promocion, ServiciosOperadorRepository $gestion) {
        //
        //usuario_servicio_id

        $validacion = $gestion->getPermisoPromocion($id_promocion);
        if (isset($validacion))
            $permiso = $gestion->getPermiso($validacion->id_usuario_servicio);
        else
            return view('errors.404');

        if (!isset($permiso) || $permiso->id_usuario != session('user_id')) {


            return view('errors.404');
        }

        $data['id'] = $id_promocion;

        //logica que comprueba si el usuario tiene promociones para ser modificados

        $listPromociones = $gestion->getPromocionesOperador($id_promocion);

        //imagenes de la promocion
        $ImgPromociones = $gestion->getImagePromocionesOperador($id_promocion);

        $view = view('Registro.editPromocion', compact('ImgPromociones', 'listPromociones'));
        return ($view);
    }

    
    public function postDeleteItinerario($id,ServiciosOperadorRepository $gestion) {



        
        $Servicio = $gestion->deleteItinerario($id);
        return response()->json(array('success' => true));
        
        
    }
    
    public function getItinerarios($id, ServiciosOperadorRepository $gestion) {
        //

          //usuario_servicio_id

        $validacion = $gestion->getPermisoItinerario($id);
        if (isset($validacion))
            $permiso = $gestion->getPermiso($validacion->id_usuario_servicio);
        else
            return view('errors.404');

        if (!isset($permiso) || $permiso->id_usuario != session('user_id')) {


            return view('errors.404');
        }

        $data['id'] = $id;

        //logica que comprueba si el usuario tiene promociones para ser modificados

        $listItinerarios = $gestion->getItinerariosUsuario($id);

        //imagenes de la promocion
        $ImgItinerarios = $gestion->getImageOperador($id, 3);
        $listDificultades = $gestion->getCatalogoDificultad();

        $view = view('Registro.editItinerario', compact('ImgItinerarios', 'listItinerarios', 'listDificultades'));
        return ($view);
    }

    /**
     * Guarda los eventos que presta un usuario o un operador.
     *
     * @return Response
     */
    public function postEvento(ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        //usuario_servicio_id
        $permiso = $gestion->getPermiso($formFields['id_usuario_servicio']);


        if (!isset($permiso) || $permiso->id_usuario != session('user_id')) {


            return view('errors.404');
        }
        $validator = Validator::make($formFields, Eventos_usuario_Servicio::$rulesP);
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        }

        //obtengo llas promociones por id
        if (isset($formFields['id'])) {
            $Evento = $gestion->getEvento($formFields['id']);
        }
        //si ya existe el objeto se hace el update
        if (isset($Evento)) {
            //logica update

            $gestion->storeUpdateEvento($formFields, $Evento);

            $returnHTML = ('/IguanaTrip/public/eventos/' . $formFields['id']);
        } else { //logica de insert
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewEvento($formFields);
            $returnHTML = ('/IguanaTrip/public/eventos/' . $object->id);
        }




        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    //Obtiene la lista de Servicios completos
    //Eventos
    //Promocioes
    //Itinerarios por usuario
    public function getAllServicios($id_usuario_servicio, Request $request, ServiciosOperadorRepository $gestion) {

        $itinerarios = $gestion->getItinerariosporUsuario($id_usuario_servicio);
        $promociones = $gestion->getPromocionesUsuarioServicio($id_usuario_servicio);
        $eventos = $gestion->getEventosUsuarioServicio($id_usuario_servicio);


        $view = View::make('reusable.modifyEventos_Promociones')->with('itinerarios', $itinerarios)->with('promociones', $promociones)->with('eventos',$eventos);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
            return $view;
    }

    //Obtiene la lista de detalles de itinerarios por id itinerario
    public function getListaItinerarios($id, Request $request, ServiciosOperadorRepository $gestion) {
        //
        //
        //logica que comprueba si el usuario tiene servicios para ser modificados
        //caso contrario ingresa nuevos serviciosS
        $listItinerarios = $gestion->getItinerariosDetalle($id);
        $id_itinerario = $id;

        $view = View::make('reusable.listaItinerarios')->with('listItinerarios', $listItinerarios)->with('id_itinerario', $id_itinerario);
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
         $permiso = $gestion->getPermiso($formFields['id_usuario_servicio']);


        if (!isset($permiso) || $permiso->id_usuario != session('user_id')) {


            return view('errors.404');
        }

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

            $gestion->storeUpdateItinerario($formFields, $Itinerario);

            $returnHTML = ('/IguanaTrip/public/itinerario/' . $formFields['id']);
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
        if (isset($formFields['id']) && $formFields['id'] != "") {

            $Itinerario = $gestion->getDetalleItinerario($formFields['id']);
        }
//si ya existe el objeto se hace el update
        if (isset($Itinerario)) {
            //logica update

            $gestion->storeUpdateDetalleItinerario($formFields, $Itinerario);
            $returnHTML = ('/IguanaTrip/public/itinerario/' . $formFields['id_itinerario']);
        } else { //logica de insert
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewDetalleItinerario($formFields);
            $returnHTML = ('/IguanaTrip/public/itinerario/' . $formFields['id_itinerario']);
        }


        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

}
