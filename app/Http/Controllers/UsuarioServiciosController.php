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
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tablaServicios() {
        //

        $usuarioServicios = Usuario_Servicio::where('id_usuario_operador', '=', 6)->get();
        return view('Registro.listaServiciosUsuario', compact('usuarioServicios'));
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
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
        
        $listServicios = $gestion->getServiciosOperador($id_usuario_op);
        //Aqui deberia ir la logica que comprueba si el usuario tiene servicios para ser modificados
        //caso contrario ingresa nuevos serviciosS
        
        $view = view('Registro.catalogoServicio',compact('data','listServicios'));
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

        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
            ));
        }


        //Arreglo de servicios prestados
        foreach ($formFields as $key => $value) {
            //verifica si el arreglo de parametros es un catalogo
            if (strpos($key, 'id_catalogo_servicio') !== false) {
                $root_array[$key] = $value;
            }
        }

        //Si hay servicios corre la logica de save
        if (count($root_array) > 0) {

            foreach ($root_array as $key1 => $value1) {
                $save_array = array();
                $save_array['id_usuario'] = $formFields['id_usuario_op'];
                $save_array['id_catalogo_servicio'] = $value1;

                $gestion->store($save_array);
            }

            //$returnHTML = view('Registro.uploadImage')->render();
            $returnHTML = ('/IguanaTrip/public/image');

            return response()->json(array('success' => true, 'redirectto' => $returnHTML));
        } else {
            return response()->json(array(
                        'fail' => true,
                        'errors' => 'No hay servicios'
            ));
        }
    }

}
