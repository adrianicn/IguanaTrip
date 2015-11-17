<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\OperadorRepository;
use Validator;
use Illuminate\Support\Facades\Hash;
use Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;

//use App\Models\Catalogo_Servicio;

class ServicioController extends Controller
{
    
	protected $validationRules = [
			'nombre_empresa_operador' => 'required|max:255|alpha',
			'nombre_contacto_operador_1' => 'required|max:255|alpha',
			'direccion_empresa_operador' => 'required|max:255',
			'email_contacto_operador' => 'required|max:255',
			'telf_contacto_operador_1' => 'required|max:255'
	];
	
	protected $validationUsuarioServicios = [
			'nombre_servicio' => 'required|max:255|',
			'detalle_servicio' => 'required|max:255|',
			'precio_desde' => 'required|max:255',
			'precio_hasta' => 'required|max:255',
			'precio_anterior' => 'required|max:255',
			'precio_actual' => 'required|max:255',
			'descuento_servico' => 'required|max:255',
			'direccion_servicio' => 'required|max:255',
			'correo_contacto' => 'required|max:255',
			'pagina_web' => 'required|max:255',
			'nombre_comercial' => 'required|max:255',
			'tags' => 'required|max:255',
			'descuento_clientes' => 'required|max:255',
			'tags_servicio' => 'required|max:255'
	];
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
	}
	
	public function Auth(Guard $auth, $view)
	{
		
		if ($auth->check()) {
			$view = view('RegistroOperadores.registroStep1'); // revisar debe redirecccionar a otro lado
		} else {
			 
			$view = view('auth.completeRegister');
		}
		 
	}
    
    /**
     * Display a listing of the resource.
     *	
     * @return \Illuminate\Http\Response
     */
    public function index(Guard $auth, OperadorRepository $operador_gestion)
    {
    	if ($auth->check()) {
    		$listOperadores = $operador_gestion->getOperador(Session::get('user_id'));
    		$view = view('RegistroOperadores.registroStep1',compact('listOperadores')); // revisar debe redirecccionar a otro lado
		} else {
			$view = view('auth.completeRegister');
		}
    	return $view;
    }
    public function step2(Guard $auth, $tipoOperador, OperadorRepository $operador_gestion)
    {
    	if ($auth->check()) {
    		$operador = $operador_gestion->getOperadorTipo(Session::get('user_id'),$tipoOperador);
    		$data['tipoOperador'] = $tipoOperador;
    		$view = view('RegistroOperadores.registroStep2',compact('data','operador')); // revisar debe redirecccionar a otro lado
    	} else {
    		$view = view('auth.completeRegister');
    	}
    	 
    	
    	return $view;
    }

    public function step3()
    {
    	return view('Registro.catalogoServicio');
    }
    

    public function step4( $id, $id_catalogo )
    {
    	$operador_gestion = new OperadorRepository() ;
    	
    	$usuarioServicio = $operador_gestion->getUsuarioServicio($id);
		$catalogoServicioEstablecimiento = $operador_gestion->getCatalogoServicioEstablecimientoExistente($id_catalogo,$id);
		if(count($catalogoServicioEstablecimiento) == 0 )
			$catalogoServicioEstablecimiento = $operador_gestion->getCatalogoServicioEstablecimiento($id_catalogo);
		
    	return view('RegistroOperadores.registroStep4', compact('usuarioServicio','catalogoServicioEstablecimiento','id_catalogo'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Handle a registration request for the application.
     *
     * @param  App\Http\Requests\RegisterRequest  $request
     * @param  App\Repositories\UserRepository $user_gestion
     * @return Response
     */
    public function postOperadores(Request $request, OperadorRepository $operador_gestion) {
    
    	$inputData = Input::get('formData');
    	parse_str($inputData, $formFields);
    	
    	$operadorData = array(
    			'nombre_empresa_operador' => $formFields['nombre_empresa_operador'],
    			'nombre_contacto_operador_1' => $formFields['nombre_contacto_operador_1'],
    			'telf_contacto_operador_1' => $formFields['telf_contacto_operador_1'],
    			'ip_registro_operador' => $this->getIp(),
    			'email_contacto_operador' => $formFields['email_contacto_operador'],
    			'direccion_empresa_operador' => $formFields['direccion_empresa_operador'],
    			'id_usuario' => $formFields['id_usuario'],
    			'id_tipo_operador' => $formFields['id_tipo_operador'],
    			'estado_contacto_operador' => 1,
    			'id_usuario_op' => $formFields['id_usuario_op']
    	);
    	$validator = Validator::make($operadorData, $this->validationRules);
    	if ($validator->fails()) {
            		return response()->json(array(
    				'fail' => true,
    				'errors' => $validator->getMessageBag()->toArray()
    		));
    	} else {
    		
    		if($formFields['id_usuario_op'] > 0){
    			$id_usuario_op = $formFields['id_usuario_op'];
    			$operador = $operador_gestion->update( $operadorData );
    		} else {
    			$operador = $operador_gestion->store( $operadorData	);
    			$operadores = $operador_gestion->getLastIdInsert( $operadorData );
    			foreach ($operadores as $operador)
    				$id_usuario_op = $operador->id_usuario_op;
    		}
    	}
    		$returnHTML = ('/IguanaTrip/public/userservice/'. $id_usuario_op);
    		return response()->json(array('success' => true, 'redirectto'=>$returnHTML));    
    
    }

    public function postTipoOperadores(Request $request, OperadorRepository $operador_gestion) {
    	$inputData = Input::get('formData');
    	parse_str($inputData, $formFields);
    	 
    	$operadorData = array(
    			'tipo_operador' => $formFields['tipo_operador'],
    	);
    	$returnHTML = ('servicios/operador/'. $operadorData['tipo_operador']);
    	return response()->json(array('success' => true, 'redirectto'=>$returnHTML));
    }
    
    private function getIp(){
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
			return $_SERVER['HTTP_CLIENT_IP'];
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		return $_SERVER['REMOTE_ADDR'];
    }
   
    public function postUsuarioServicios(Request $request, OperadorRepository $usuarioSevicio_gestion)
    {
    	$inputData = Input::get('formData');
    	parse_str($inputData, $formFields);
    	
    	foreach ($formFields['id_servicio_est'] as $catalogo)
    		$servicio_establecimiento_usuario[] = $catalogo;
    	
//     	var_dump($servicio_establecimiento_usuario);
//     	exit;
    	
    	$usuarioServicioData = array(
    			'nombre_servicio' => $formFields['nombre_servicio'],
    			'detalle_servicio' => $formFields['detalle_servicio'],
    			'precio_desde' => $formFields['precio_desde'],
    			'precio_hasta' => $formFields['precio_hasta'],
    			'precio_anterior' => $formFields['precio_anterior'],
    			'precio_actual' => $formFields['precio_actual'],
    			'descuento_servico' => $formFields['descuento_servico'],
    			'direccion_servicio' => $formFields['direccion_servicio'],
    			'correo_contacto' => $formFields['correo_contacto'],
    			'pagina_web' => $formFields['pagina_web'],
    			'nombre_comercial' => $formFields['nombre_comercial'],
    			'tags' => $formFields['tags'],
    			'descuento_clientes' => $formFields['descuento_clientes'],
    			'tags_servicio' => $formFields['tags_servicio'],
    			'observaciones' => $formFields['observaciones'],
    			'telefono' => $formFields['telefono'],
    			'id_usuario_servicio' => $formFields['id']
    	);
    	$validator = Validator::make($usuarioServicioData, $this->validationUsuarioServicios);
    	if ($validator->fails()) {
    		return response()->json(array(
    				'fail' => true,
    				'errors' => $validator->getMessageBag()->toArray()
    		));
    	} else {
    	
    		//return $servicio_establecimiento_usuario;
    			$usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServicios( $usuarioServicioData, $servicio_establecimiento_usuario, $formFields['id'], $formFields['id_catalogo'] );
    	}
    	$returnHTML = ('/IguanaTrip/public');
   	return response()->json(array('success' => true, 'redirectto'=>$returnHTML));
    	 
    }
    
    public function postUsuarioServiciosMini(Request $request, OperadorRepository $usuarioSevicio_gestion)
    {
    	$inputData = Input::get('formData');
    	parse_str($inputData, $formFields);
    	 
    	$usuarioServicioData = array(
    			'nombre_servicio' => $formFields['nombre_servicio'],
    			'detalle_servicio' => $formFields['detalle_servicio'],
    			'id_usuario_operador' => $formFields['id_usuario_operador'],
    			'id_catalogo_servicio' => $formFields['id_catalogo_servicio']
    	);
   		$usuarioServicio = $usuarioSevicio_gestion->storageUsuarioServiciosMini( $usuarioServicioData );
    	$returnHTML = ('servicios/serviciooperador/'.$usuarioServicio.'/'.$formFields['id_catalogo_servicio']);
    	return response()->json(array('success' => true, 'redirectto'=>$returnHTML));
    	 
    }
    
}
