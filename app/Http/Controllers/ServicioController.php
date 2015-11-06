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
    public function index(Guard $auth)
    {
    	if ($auth->check()) {
			$view = view('RegistroOperadores.registroStep1'); // revisar debe redirecccionar a otro lado
		} else {
			 
			$view = view('auth.completeRegister');
		}
    	//
    	//$catalogos = DB::table('catalogo_servicios')->get();
    	//$catalogos = Catalogo_Servicio::all();
    	return $view;
//        return view('front.masterPageRegistro')->with(['catalogos' => $catalogos]);
    }
    public function step2($tipoOperador)
    {
    	//
    	//$catalogos = DB::table('catalogo_servicios')->get();
    	//$catalogos = Catalogo_Servicio::all();
    	$data['tipoOperador'] = $tipoOperador;
    	return view('RegistroOperadores.registroStep2',$data);
    	//        return view('front.masterPageRegistro')->with(['catalogos' => $catalogos]);
    }
    public function step3()
    {
    	return view('RegistroOperadores.registroStep3');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    			'estado_contacto_operador' => 1    			
    	);
    	$validator = Validator::make($operadorData, $this->validationRules);
    	if ($validator->fails()) {
            		return response()->json(array(
    				'fail' => true,
    				'errors' => $validator->getMessageBag()->toArray()
    		));
    	} else {
    		$operador = $operador_gestion->store( $operadorData	);
    
    		$returnHTML = ('/IguanaTrip/public/servicios/operadorServicios');
    		return response()->json(array('success' => true, 'redirectto'=>$returnHTML));    
    
    	}
    	 
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
    
}
