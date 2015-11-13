<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ServiciosOperadorRepository;
use Validator;
use Input;
use App\Models\Usuario_Servicio;

class UsuarioServiciosController extends Controller {

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

}
