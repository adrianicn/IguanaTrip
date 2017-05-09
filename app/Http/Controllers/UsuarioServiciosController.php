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
use Illuminate\Contracts\Auth\Guard;

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
    public function getEventos(Guard $auth,$id, ServiciosOperadorRepository $gestion) {
        //

        $validacion = $gestion->getPermisoEvento($id);
        if (isset($validacion))
        {
        $permiso = $gestion->getPermiso($validacion->id_usuario_servicio);}
        else{
        return view('errors.404');}

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {


            return view('errors.404');
        }

        $listEventos = $gestion->getEventosporId($id);
        foreach ($listEventos as $servicioBase) {

            $servicio = $gestion->getUsuario_serv($servicioBase->id_usuario_servicio);
        }
        

        return view('Registro.editEvento', compact('listEventos', 'servicio'));
    }

    //despliega la descipcion de las provincias
    public function getProvinciasDescipcion() {

        return view('Admin.provincia');
    }

    public function getCantonesDescipcion() {
        //
        return view('Admin.canton');
    }

    public function getParroquiaDescipcion(Request $request) {
        //
        $request->session()->put('parroquia_admin', 1);
        return view('Admin.parroquia');
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

    public function getProvinciaCanton(Request $request, ServiciosOperadorRepository $gestion) {
        //

        $listProvincias = $gestion->getProvincias();


        $view = View::make('reusable.provinciaCanton')->with('provincias', $listProvincias);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
            return $view;
    }

    public function getProvincias(Request $request, ServiciosOperadorRepository $gestion, $id_provincia, $id_canton, $id_parroquia) {
        //

        $listProvincias = $gestion->getProvincias();


        $view = View::make('reusable.provincia')->with('provincias', $listProvincias)->with('id_provincia', $id_provincia)->with('id_canton', $id_canton)->with('id_parroquia', $id_parroquia);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
            return $view;
    }

    public function getOnlyProvincias(Request $request, ServiciosOperadorRepository $gestion) {
        //

        $listProvincias = $gestion->getProvincias();


        $view = View::make('reusable.onlyProvincia')->with('provincias', $listProvincias);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
        } else{
        return $view;}
    }

    public function getOnlyCanton(Request $request, ServiciosOperadorRepository $gestion, $id) {

        $listCantones = $gestion->getRecursivo($id);
        
        $view = View::make('reusable.onlyCanton')->with('cantones', $listCantones);
        if ($request->ajax()) {
            $sections = $view->rendersections();
            return Response::json($sections);
        } else
        {
        return $view;}
    }

    public function getCantones(Request $request, ServiciosOperadorRepository $gestion, $id, $id_canton, $id_parroquia) {

        $listCantones = $gestion->getRecursivo($id);
        $view = View::make('reusable.canton')->with('cantones', $listCantones)->with('id_provincia', $id)->with('id_canton', $id_canton)->with('id_parroquia', $id_parroquia);
        if ($request->ajax()) {
            $sections = $view->rendersections();
            return Response::json($sections);
        } else
        {            return $view;}
    }

    public function getDescripcionGeografica(Request $request, ServiciosOperadorRepository $gestion, $id, $id_catalogo) {

        $lista = $gestion->getRecursivoDescription($id);
        

        $view = View::make('Admin.descripcionProvincia')->with('descripcion', $lista)->with('typeGeo', $id_catalogo);
        if ($request->ajax()) {
            $sections = $view->rendersections();

            return Response::json($sections);
        } else
        {            return $view;}
    }

    public function getparroquias(Request $request, ServiciosOperadorRepository $gestion, $id, $id_parroquia) {

        $listParroquia = $gestion->getRecursivo($id);
        $view = View::make('reusable.parroquia')->with('parroquias', $listParroquia)->with('id_parroquia', $id_parroquia);
        if ($request->ajax()) {
            $sections = $view->rendersections();

            return Response::json($sections);
        } else
        {            return $view;}
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
        } else
        { return $view;}
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
        if ($request->ajax()) {
            $sections = $view->render();
            return response()->json(['newHtml' => $sections]);
        } else
        {return $view;}
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
            {$serviciosBase['estado_evento'] = 0;}
            else
            {$serviciosBase['estado_evento'] = 1;}

            $serviciosBase['id'] = $servicioBase->id;
        }

        $gestion->storeUpdateEstadoEvento($serviciosBase, $ServiciosOperador);
        return response()->json(array('success' => true));
    }

    //actualiza el estado de las promociones
    public function postEstadoPromocion($id, ServiciosOperadorRepository $gestion) {

        $serviciosBase = array();
        //obtengo los servicios ya almacenados de la bdd
        $ServiciosOperador = $gestion->getEstadoPromocion($id);

        foreach ($ServiciosOperador as $servicioBase) {

            if ($servicioBase->estado_promocion == 1)
            { $serviciosBase['estado_promocion'] = 0;}
            else
            {$serviciosBase['estado_promocion'] = 1;}

            $serviciosBase['id'] = $servicioBase->id;
        }

        $gestion->storeUpdateEstadoPromocion($serviciosBase, $ServiciosOperador);
        return response()->json(array('success' => true));
    }

    //actualiza el estado del itinerario
    public function postEstadoItinerario($id, ServiciosOperadorRepository $gestion) {

        $serviciosBase = array();
        //obtengo los servicios ya almacenados de la bdd
        $ServiciosOperador = $gestion->getEstadoItiner($id);

        foreach ($ServiciosOperador as $servicioBase) {


            if ($servicioBase->estado_itinerario == 1)
            { $serviciosBase['estado_itinerario'] = 0;}
            else
            {$serviciosBase['estado_itinerario'] = 1;}

            $serviciosBase['id'] = $servicioBase->id;
        }


        $gestion->storeUpdateEstadoItinerarioPrincipal($serviciosBase, $ServiciosOperador);
        return response()->json(array('success' => true));
    }

    //actualiza el estado del detalleitinerario
    public function postEstadoDetalleItinerario($id, ServiciosOperadorRepository $gestion) {


        $serviciosBase = array();
        //obtengo los servicios ya almacenados de la bdd
        $ServiciosOperador = $gestion->getEstadoDetalleItiner($id);

        foreach ($ServiciosOperador as $servicioBase) {

            if ($servicioBase->estado_punto == 1)
            {$serviciosBase['estado_punto'] = 0;}
            else
            {$serviciosBase['estado_punto'] = 1;}

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
            {$save_array['estado_servicio_usuario'] = 1;}
        } else
        {$save_array['estado_servicio_usuario'] = 0;}

        $gestion->storeUpdateEstado($save_array, $Servicio);

        return response()->json(array(
                    'success' => true,
                    'message' => trans('front/verify.message')
        ));
    }

    /**
     * Guarda las promocionses que presta un usuario o un operador.
     *
     * @return Response
     */
    public function postPromocion(Guard $auth,ServiciosOperadorRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        //usuario_servicio_id
        $permiso = $gestion->getPermiso($formFields['id_usuario_servicio']);

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {
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
            
        //Gestion de actualizacion de busqueda    
            $search=$formFields['nombre_promocion']." ".$formFields['descripcion_promocion']." ".$formFields['codigo_promocion']." ".$formFields['tags']." ".$formFields['observaciones_promocion'];            
            $gestion->storeUpdateSerchEngine( $Promocion,1,$formFields['id'],$search);
            $returnHTML = ('/IguanaTrip/public/servicios/serviciooperador/'.$formFields['id_usuario_servicio'].'/'.$formFields['catalogo']);
        } else { //logica de insert
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewPromocion($formFields);
       
            //Gestion de nueva de busqueda    
             $search=$formFields['nombre_promocion']." ".$formFields['descripcion_promocion']." ".$formFields['codigo'];            
            $gestion->storeSearchEngine($formFields['id_usuario_servicio'], $search,1,$object->id);

            $returnHTML = ('/IguanaTrip/public/promocion/' . $object->id);
            
        }

        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    
    
    //Post para cambiar las descripciones de provincia canton parroquia
    public function postGeoLoc(ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        
        //return $formFields;
        $gestion->UpdateGeoLoc($formFields);
        
          /*$usuarioServicioData = array(
            'nombre_servicio' => $formFields['nombre_servicio'],
            'detalle_servicio' => $formFields['detalle_servicio'],
               'id_usuario_servicio' => $formFields['id'],
            'id_provincia' => $formFields['id_provincia'],
            'id_canton' => $formFields['id_canton'],
            'id_parroquia' => $formFields['id_parroquia']  );*/
        return response()->json(array('success' => true));
    }

    /**
     * Despliega las promociones por operador
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPromociones(Guard $auth,$id_promocion, ServiciosOperadorRepository $gestion) {
        //
        //usuario_servicio_id

        $validacion = $gestion->getPermisoPromocion($id_promocion);
        if (isset($validacion))
        {$permiso = $gestion->getPermiso($validacion->id_usuario_servicio);}
        else
        {return view('errors.404');}

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {

            return view('errors.404');
        }

        $data['id'] = $id_promocion;

        //logica que comprueba si el usuario tiene promociones para ser modificados

        $listPromociones = $gestion->getPromocionesOperador($id_promocion);
        foreach ($listPromociones as $servicioBase) {

            $servicio = $gestion->getUsuario_serv($servicioBase->id_usuario_servicio);
        }

        //imagenes de la promocion
        $ImgPromociones = $gestion->getImagePromocionesOperador($id_promocion);

        $view = view('Registro.editPromocion', compact('ImgPromociones', 'listPromociones', 'servicio'));
        return ($view);
    }
    
    
    public function getImages(Request $request,$tipo, $idtipo,ServiciosOperadorRepository $gestion) {
        
         $ImgPromociones = $gestion->getGenericImagePromocionesOperador($tipo,$idtipo);

        $view = View::make('reusable.imageContainerAjax')->with('ImgPromociones', $ImgPromociones);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
        {
        return $view;}
        
        
        
    }
    
    
      
    public function getImagesDescription(Request $request,$tipo, $idtipo,ServiciosOperadorRepository $gestion) {
        
         $ImgPromociones = $gestion->getGenericImagePromocionesOperador($tipo,$idtipo);

        $view = View::make('reusable.imageContainerDescriptionAjax')->with('ImgPromociones', $ImgPromociones);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
        {
        return $view;}
        
        
        
    }

    public function postDeleteItinerario($id, ServiciosOperadorRepository $gestion) {

        $gestion->deleteItinerario($id);
        return response()->json(array('success' => true));
    }


    
    public function getItinerarios(Guard $auth,$id, ServiciosOperadorRepository $gestion) {
        //
        $validacion = $gestion->getPermisoItinerario($id);
        if (isset($validacion))
        {$permiso = $gestion->getPermiso($validacion->id_usuario_servicio);}
        else
        {return view('errors.404');}

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {

            return view('errors.404');
        }

        //$data['id'] = $id;

        //logica que comprueba si el usuario tiene promociones para ser modificados

        $listItinerarios = $gestion->getItinerariosUsuario($id);

        foreach ($listItinerarios as $servicioBase) {

            $servicio = $gestion->getUsuario_serv($servicioBase->id_usuario_servicio);
        }

        //imagenes de la promocion
        
        $listDificultades = $gestion->getCatalogoDificultad();

        $view = view('Registro.editItinerario', compact( 'listItinerarios', 'listDificultades', 'servicio'));
        return ($view);
    }

    /**
     * Guarda los eventos que presta un usuario o un operador.
     *
     * @return Response
     */
    public function postEvento(Guard $auth,ServiciosOperadorRepository $gestion) {
        

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $permiso = $gestion->getPermiso($formFields['id_usuario_servicio']);

        
         
        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {

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

            //Gestion de actualizacion de busqueda    
            $search=$formFields['nombre_evento']." ".$formFields['descripcion_evento']." ".$formFields['tags'];            
            
            $gestion->storeUpdateSerchEngine( $Evento,2,$formFields['id'],$search);
            $returnHTML = ('/IguanaTrip/public/servicios/serviciooperador/'.$formFields['id_usuario_servicio'].'/'.$formFields['catalogo']);

            
            //$returnHTML = ('/IguanaTrip/public/servicios/serviciooperador/'.$formFields['id_usuario_servicio'].'/'.$formFields['catalogo']);
        } else { //logica de insert
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewEvento($formFields);
            //Gestion de nueva de busqueda    
            $search=$formFields['nombre_evento']." ".$formFields['descripcion_evento'];            
            $gestion->storeSearchEngine($formFields['id_usuario_servicio'], $search,2,$object->id);
            $returnHTML = ('/IguanaTrip/public/eventos/'.$object->id);
        }

        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    //Obtiene la lista de Servicios completos
    //Eventos
    //Promocioes
    //Itinerarios por usuario
    //Especilaidades por Usuario Servicio
    public function getAllServicios($id_usuario_servicio, Request $request, ServiciosOperadorRepository $gestion) {

        $itinerarios = $gestion->getItinerariosporUsuario($id_usuario_servicio);
        $promociones = $gestion->getPromocionesUsuarioServicio($id_usuario_servicio);
        $eventos = $gestion->getEventosUsuarioServicio($id_usuario_servicio);
        
        //*******************************************************************************//
        //              OBTENGO LAS ESPECIALIDADES POR USUARIO SERVICIO                  //
        //*******************************************************************************//
        $especialidad = $gestion->getEspecialidadporUsuario($id_usuario_servicio);
        
        $hijos = $gestion->getHijosUsuarioServicio($id_usuario_servicio);


        $view = View::make('reusable.modifyEventos_Promociones')
                ->with('itinerarios', $itinerarios)
                ->with('promociones', $promociones)
                ->with('eventos', $eventos)
                ->with('especialidad', $especialidad)
                ->with('hijos', $hijos);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
        {
        return $view;}
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
        {            return $view;}
    }

    /**
     * Guarda los itinerarios que presta un usuario o un operador.
     *
     * @return Response
     */
    public function postItinerario(Guard $auth,ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $permiso = $gestion->getPermiso($formFields['id_usuario_servicio']);




     
        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {

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
            
            //Gestion de actualizacion de busqueda    
            
            $search=$formFields['nombre_itinerario']." ".$formFields['descripcion_itinerario']." ".$formFields['observaciones_itinerario']." ".$formFields['tags'];            
            $gestion->storeUpdateSerchEngine( $Itinerario,3,$formFields['id'],$search);
        
            

            $returnHTML = ('/IguanaTrip/public/itinerario/' . $formFields['id']);
        } else { //logica de insert
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewItinerario($formFields);
            
            //Gestion de nueva de busqueda    
            $search=$formFields['nombre_itinerario']." ".$formFields['descripcion_itinerario'];            
            $gestion->storeSearchEngine($formFields['id_usuario_servicio'], $search,3,$object->id);
            
            $returnHTML = ('/IguanaTrip/public/itinerario/' . $object->id);
        }




        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

	//**************************************************************************************************//
	//      FUNCION PARA GUARDAR Y ACTUALIZAR UNA ESPECIALIDAD					    //
	//**************************************************************************************************//

	public function postEspecialidad(Guard $auth,ServiciosOperadorRepository $gestion) {

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $permiso = $gestion->getPermiso($formFields['id_usuario_servicio']);
        
        //obtengo las especialidades por id
        if (isset($formFields['id'])) {
            $Especialidad = $gestion->getEspecialidad($formFields['id']);
        }

        //return response()->json(array('success' => true, 'redirectto' => $returnHTML));
        
        if (isset($Especialidad)) {
            //logica update

            $gestion->storeUpdateEspecialidad($formFields, $Especialidad);
            
            //Gestion de actualizacion de busqueda    
            //$search=$formFields['nombre_itinerario']." ".$formFields['descripcion_itinerario']." ".$formFields['observaciones_itinerario']." ".$formFields['tags'];            
            //$gestion->storeUpdateSerchEngine( $Itinerario,3,$formFields['id'],$search);
        
            $returnHTML = ('/especialidad/' . $formFields['id']);
            
        } else { //logica de insert
            
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewEspecialidad($formFields);    
            
            //Gestion de nueva de busqueda    
            //$search=$formFields['nombre_itinerario']." ".$formFields['descripcion_itinerario'];            
            //$gestion->storeSearchEngine($formFields['id_usuario_servicio'], $search,3,$object->id);
          
            $returnHTML = '/especialidad/'.$object->id;
            
        }




        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

    //******************************************************************************//
    //                 ACTUALIZA EL ESTADO DE LA ESPEECIALIDAD                      //
    //******************************************************************************//
    public function postEstadoEspecialidad($id, ServiciosOperadorRepository $gestion) {

        $serviciosBase = array();
        //obtengo los servicios ya almacenados de la bdd
        $ServiciosOperador = $gestion->getEstadoEspecialidad($id);

        foreach ($ServiciosOperador as $servicioBase) {


            if ($servicioBase->activo == 1){ 
                $serviciosBase['activo'] = 0;
            }else{
                $serviciosBase['activo'] = 1;
            }

            $serviciosBase['id'] = $servicioBase->id;
        }


        $gestion->storeUpdateEstadoEspecialidadPrincipal($serviciosBase, $ServiciosOperador);
        return response()->json(array('success' => true));
    }

//******************************************************************************//
    //                 ACTUALIZA EL ESTADO DEL CALENDARIO DE BOOKING                //
    //******************************************************************************//
    public function postEstadoBooking($id, ServiciosOperadorRepository $gestion) {

        $serviciosBase = array();
        //obtengo los servicios ya almacenados de la bdd
        $ServiciosOperador = $gestion->getEstadoBookingCalendar($id);

        foreach ($ServiciosOperador as $servicioBase) {


            if ($servicioBase->activo == 1){ 
                $serviciosBase['activo'] = 0;
            }else{
                $serviciosBase['activo'] = 1;
            }

            $serviciosBase['id'] = $servicioBase->id;
        }


        $gestion->storeUpdateEstadoBookingCalendar($serviciosBase, $ServiciosOperador);
        return response()->json(array('success' => true));
    }
    
    
    //******************************************************************************//
    //                 CONTROLADOR PARA IR AL SITIO DE BOOKING                      //
    //******************************************************************************//
    public function booking($id,ServiciosOperadorRepository $gestion) {

        $usuarioOperador = session('operador_id');
        
        //OBTENGO EL ID DEL USUARIO A PARTIR DEL USUARIO OPERADOR
        $idUsuario = $gestion->getIDUsuario($usuarioOperador);
        $idUser = $idUsuario[0];
        $idUser = $idUser->id_usuario;
        
        //OBTENGO LA INFORMACION DEL USUARIO
        $infoTablaUser = $gestion->getInfoUser($idUser);
        $identificadorUser = $infoTablaUser[0]->id;
        $emailUser = $infoTablaUser[0]->email;
        $passwordUser = $infoTablaUser[0]->password;
        $nombreUsuarioLarvel = $infoTablaUser[0]->username; 
        
        //VERIFICO SI EL USUARIO YA EXISTE EN LA TABLA BOOKING
        $verificarUsuarioExiste = $gestion->getVerificarUsuario($identificadorUser,$emailUser);
        
        //GENERO LA FECHA Y EL IDENTIFICADOR
        $fecha = \Carbon\Carbon::now()->toDateTimeString();
        $uuid = $idUser."_".$fecha;
        
        /*if($verificarUsuarioExiste == 0){
            //HAGO EL INSERT EN LA TABLA BOOKING_USER CON LA INFORMACION DEL USUARIO
            $ingresarUsuario = $gestion->ingresarUsuario($identificadorUser,$emailUser,$passwordUser,$nombreUsuarioLarvel,$fecha);
        }*/
        
        //ENCRIPTO EL IDENTIFICADOR
        $encriptado =  \Crypt::encrypt($uuid);
        //$desencriptado = \Crypt::decrypt($passwordUser);
        
        //GUARDA EN LA TABLA VERIFICAR BOOKING
        $guardarBooking = $gestion->guardarVerificarBooking($idUser,$id,$encriptado);
        $guardarBook = $guardarBooking->uuid;
        
        if($guardarBook === ""){
            
            //redirigir a la pagina de error
            //return view('errors.404');
            return response()->json(array('success' => false));
            
        }else{
            
        $returnHTML = ('http://localhost/Booking/index.php?controller=pjAdmin&action=pjActionLogin&verify='.$encriptado);
        return response()->json(array('success' => true, 
                                      'redirectto' => $returnHTML,
                                      //'nuevo'=> $desencriptado
                                      //'Id de usuario' => $idUser, 
                                      //'Informacion Usuario' => $infoTablaUser,
                                      //'email' => $emailUser,
                                      //'password' => $passwordUser,
                                      //'contador Existe' => $verificarUsuarioExiste,
                                      //'Insert en la tabla' => $ingresarUsuario   
                                      //'IDUsuario' => $idUser,
                                      //'Consumido'=> $consumido,
                                      //'UUID'=> $uuid,
                                     //'encriptado'=>$encriptado,
                                      ));
            
        }
        
        
   
    }
    
    //******************************************************************************//
    //            CONTROLADOR PARA IR AL SETTING DEL CALENDARIO BOOKING             //
    //******************************************************************************//
    public function bookingCalendar($id,$id_calendar,ServiciosOperadorRepository $gestion) {

        $usuarioOperador = session('operador_id');
        
        //OBTENGO EL ID DEL USUARIO A PARTIR DEL USUARIO OPERADOR
        $idUsuario = $gestion->getIDUsuario($usuarioOperador);
        $idUser = $idUsuario[0];
        $idUser = $idUser->id_usuario;
        
        //OBTENGO LA INFORMACION DEL USUARIO
        $infoTablaUser = $gestion->getInfoUser($idUser);
        $identificadorUser = $infoTablaUser[0]->id;
        $emailUser = $infoTablaUser[0]->email;
        $passwordUser = $infoTablaUser[0]->password;
        $nombreUsuarioLarvel = $infoTablaUser[0]->username; 
        
        //VERIFICO SI EL USUARIO YA EXISTE EN LA TABLA BOOKING
        $verificarUsuarioExiste = $gestion->getVerificarUsuario($identificadorUser,$emailUser);
        
        //GENERO LA FECHA Y EL IDENTIFICADOR
        $fecha = \Carbon\Carbon::now()->toDateTimeString();
        $uuid = $idUser."_".$fecha;
        
        //ENCRIPTO EL IDENTIFICADOR
        $encriptado =  \Crypt::encrypt($uuid);
        //$desencriptado = \Crypt::decrypt($passwordUser);
        
        //GUARDA EN LA TABLA VERIFICAR BOOKING
        $guardarBooking = $gestion->guardarVerificarBooking($idUser,$id,$encriptado);
        $guardarBook = $guardarBooking->uuid;
        
        if($guardarBook === ""){
            
            //redirigir a la pagina de error
            //return view('errors.404');
            return response()->json(array('success' => false));
            
        }else{
        
            
        $returnHTML = ('http://localhost/Booking/index.php?controller=pjAdmin&action=pjActionLogin&verifyCalendar='.$encriptado.'&calendar='.$id_calendar);    
        //$returnHTML = ('http://localhost/Booking/index.php?controller=pjAdminCalendars&action=pjActionView&id='.$id_calendar);
        return response()->json(array('success' => true, 
                                      'redirectto' => $returnHTML,
                                      //'nuevo'=> $desencriptado
                                      //'Id de usuario' => $idUser, 
                                      //'Informacion Usuario' => $infoTablaUser,
                                      //'email' => $emailUser,
                                      //'password' => $passwordUser,
                                      //'contador Existe' => $verificarUsuarioExiste,
                                      //'Insert en la tabla' => $ingresarUsuario   
                                      //'IDUsuario' => $idUser,
                                      //'Consumido'=> $consumido,
                                      //'UUID'=> $uuid,
                                     //'encriptado'=>$encriptado,
                                      ));
            
        }
        
        
   
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
            //Gestion de actualizacion de busqueda    
            $search=$formFields['lugar_punto']." ".$formFields['incluye_punto'];            
            $gestion->storeUpdateSerchEngine( $Itinerario,4,$formFields['id'],$search);
        
            
            $returnHTML = ('/IguanaTrip/public/itinerario/' . $formFields['id_itinerario']);
        } else { //logica de insert
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewDetalleItinerario($formFields);
            
            //Gestion de nueva de busqueda    
             $search=$formFields['lugar_punto']." ".$formFields['incluye_punto'];            
            $gestion->storeSearchEngine($formFields['id_usuario_servicio'], $search,4,$object->id);
            
            $returnHTML = ('/IguanaTrip/public/itinerario/' . $formFields['id_itinerario']);
        }


        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }

 public function getServiciosOperadorRes(ServiciosOperadorRepository $gestion) {
        //

        $data['id_usuario_op'] = session('operador_id');

        //logica que comprueba si el usuario tiene servicios para ser modificados
        //caso contrario ingresa nuevos serviciosS
        $listServicios = $gestion->getServiciosOperador(session('operador_id'));

        $view = view('responsive.dashboard', compact('data', 'listServicios'));
        return ($view);
    }
    
    public function tablaServiciosRes(Guard $auth,ServiciosOperadorRepository $gestion, OperadorRepository $operador_gestion) {
        //
        $operador = $operador_gestion->getOperadorTipo($auth->user()->id, session('tip_oper'));
        $data['tipoOperador'] = session('tip_oper');    
        $listServiciosUnicos = $gestion->getServiciosOperadorUnicos(session('operador_id'));
        
        $controlDashboard = $gestion->getControlDashboard(session('operador_id'));
        $listServiciosAll = $gestion->getServiciosOperadorAll(session('operador_id'));
        
        return view('responsive.servicios', compact('listServiciosUnicos', 'listServiciosAll','data',"operador",'controlDashboard'));
    }
    
    public function postPromocion1(Guard $auth,ServiciosOperadorRepository $gestion) {


        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);

        //usuario_servicio_id
        $permiso = $gestion->getPermiso($formFields['id_usuario_servicio']);

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {
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
            
        //Gestion de actualizacion de busqueda    
            $search=$formFields['nombre_promocion']." ".$formFields['descripcion_promocion']." ".$formFields['codigo_promocion']." ".$formFields['tags']." ".$formFields['observaciones_promocion'];            
            $gestion->storeUpdateSerchEngine( $Promocion,1,$formFields['id'],$search);
            //$returnHTML = ('/servicios/serviciooperador/'.$formFields['id_usuario_servicio'].'/'.$formFields['catalogo']);
            $returnHTML = ('/edicionServicios');
        } else { //logica de insert
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewPromocion($formFields);
       
            //Gestion de nueva de busqueda    
             $search=$formFields['nombre_promocion']." ".$formFields['descripcion_promocion']." ".$formFields['codigo'];            
            $gestion->storeSearchEngine($formFields['id_usuario_servicio'], $search,1,$object->id);

            $returnHTML = ('/promocion1/' . $object->id);
            
        }

        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    public function postEvento1(Guard $auth,ServiciosOperadorRepository $gestion) {
        

        $inputData = Input::get('formData');
        parse_str($inputData, $formFields);
        $permiso = $gestion->getPermiso($formFields['id_usuario_servicio']);

        
         
        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {

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

            //Gestion de actualizacion de busqueda    
            $search=$formFields['nombre_evento']." ".$formFields['descripcion_evento']." ".$formFields['tags'];            
            
            $gestion->storeUpdateSerchEngine( $Evento,2,$formFields['id'],$search);
            //$returnHTML = ('/servicios/serviciooperador/'.$formFields['id_usuario_servicio'].'/'.$formFields['catalogo']);
            $returnHTML = ('/edicionServicios');

            
        } else { //logica de insert
            //Arreglo de inputs prestados que vienen del formulario
            $object = $gestion->storeNewEvento($formFields);
            //Gestion de nueva de busqueda    
            $search=$formFields['nombre_evento']." ".$formFields['descripcion_evento'];            
            $gestion->storeSearchEngine($formFields['id_usuario_servicio'], $search,2,$object->id);
            $returnHTML = ('/eventos1/'.$object->id);
        }

        return response()->json(array('success' => true, 'redirectto' => $returnHTML));
    }
    
    public function getPromociones1(Guard $auth,$id_promocion, ServiciosOperadorRepository $gestion) {
        //
        //usuario_servicio_id

        $validacion = $gestion->getPermisoPromocion($id_promocion);
        if (isset($validacion))
        {$permiso = $gestion->getPermiso($validacion->id_usuario_servicio);}
        else
        {return view('errors.404');}

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {

            return view('errors.404');
        }

        $data['id'] = $id_promocion;

        //logica que comprueba si el usuario tiene promociones para ser modificados

        $listPromociones = $gestion->getPromocionesOperador($id_promocion);
        foreach ($listPromociones as $servicioBase) {

            $servicio = $gestion->getUsuario_serv($servicioBase->id_usuario_servicio);
        }

        //imagenes de la promocion
        $ImgPromociones = $gestion->getImagePromocionesOperador($id_promocion);

        $view = view('responsive.editPromocion', compact('ImgPromociones', 'listPromociones', 'servicio'));
        return ($view);
    }
    
    public function getEventos1(Guard $auth,$id, ServiciosOperadorRepository $gestion) {
        //

        $validacion = $gestion->getPermisoEvento($id);
        if (isset($validacion))
        {
        $permiso = $gestion->getPermiso($validacion->id_usuario_servicio);}
        else{
        return view('errors.404');}

        if (!isset($permiso) || $permiso->id_usuario != $auth->user()->id) {


            return view('errors.404');
        }

        $listEventos = $gestion->getEventosporId($id);
        foreach ($listEventos as $servicioBase) {

            $servicio = $gestion->getUsuario_serv($servicioBase->id_usuario_servicio);
        }
        

        return view('responsive.editEvento', compact('listEventos', 'servicio'));
    }
    
    public function getAllServicios1($id_usuario_servicio, Request $request, ServiciosOperadorRepository $gestion) {

        $itinerarios = $gestion->getItinerariosporUsuario($id_usuario_servicio);
        $promociones = $gestion->getPromocionesUsuarioServicio($id_usuario_servicio);
        $eventos = $gestion->getEventosUsuarioServicio($id_usuario_servicio);
        
        //*******************************************************************************//
        //              OBTENGO LAS ESPECIALIDADES POR USUARIO SERVICIO                  //
        //*******************************************************************************//
        $especialidad = $gestion->getEspecialidadporUsuario($id_usuario_servicio);
        
        $hijos = $gestion->getHijosUsuarioServicio($id_usuario_servicio);


        $view = View::make('reusable.modifyEventos_Promociones1')
                ->with('itinerarios', $itinerarios)
                ->with('promociones', $promociones)
                ->with('eventos', $eventos)
                ->with('especialidad', $especialidad)
                ->with('hijos', $hijos);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
        {
        return $view;}
    }     
    
    public function getImages1(Request $request,$tipo, $idtipo,ServiciosOperadorRepository $gestion) {
        
         $ImgPromociones = $gestion->getGenericImagePromocionesOperador($tipo,$idtipo);

        $view = View::make('reusable.imageContainerAjax1')->with('ImgPromociones', $ImgPromociones);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
        {
        return $view;}
        
        
        
    }
    
        
    public function getImagesDescription1(Request $request,$tipo, $idtipo,ServiciosOperadorRepository $gestion) {
        
         $ImgPromociones = $gestion->getGenericImagePromocionesOperador($tipo,$idtipo);

        $view = View::make('reusable.imageContainerDescriptionAjax1')->with('ImgPromociones', $ImgPromociones);
        if ($request->ajax()) {
            $sections = $view->rendersections();


            return Response::json($sections);
            //return  Response::json($sections['contentPanel']); 
        } else
        {
        return $view;}
        
        
        
    }	
	
	
}
