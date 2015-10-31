<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Catalogo_Servicio;

class RegistroController extends Controller
{
    
	protected $validationRules = [
			'nombre_empresa_operador' => 'required|max:255|alpha',
			'nombre_contacto_operador_1' => 'required|max:255|alpha',
			'telf_contacto_operador_1' => 'required|max:255|alpha',
	];
	
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    	//$catalogos = DB::table('catalogo_servicios')->get();
    	$catalogos = Catalogo_Servicio::all();
    	return view('RegistroOperadores.registroStep1');
//        return view('front.masterPageRegistro')->with(['catalogos' => $catalogos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function postRegister(Request $request, UserRepository $user_gestion) {
    
    
    	sleep(5);
    
    	$inputData = Input::get('formData');
    	parse_str($inputData, $formFields);
    	$userData = array(
    			'nombre_empresa_operador' => $formFields['nombre_empresa_operador'],
    			'nombre_contacto_operador_1' => $formFields['nombre_contacto_operador_1'],
    			'telf_contacto_operador_1' => $formFields['telf_contacto_operador_1'],
    			'ip_registro_operador' => $this->getIp()
    	);
    	$validator = Validator::make($userData, $this->validationRules);
    
    
    
    	if ($validator->fails()) {
    
    
    		return response()->json(array(
    				'fail' => true,
    				'errors' => $validator->getMessageBag()->toArray()
    		));
    	} else {
    		$user = $user_gestion->store(
    				$userData, $confirmation_code = str_random(30)
    		);
    
    
    
    		$this->dispatch(new SendMail($user));
    		//    return redirect('/')->with('ok', trans('front/verify.message'));
    		//return redirect('/auth/confirmation/'.$confirmation_code);*/
    
    		return response()->json(array(
    				'success' => true,
    				'message' => trans('front/verify.message')
    		));
    		//}
    	}
    }
    private function getIp(){
    	if (isset($_SERVER["HTTP_CLIENT_IP"]))
    	{
    		return $_SERVER["HTTP_CLIENT_IP"];
    	}
    	elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
    	{
    		return $_SERVER["HTTP_X_FORWARDED_FOR"];
    	}
    	elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
    	{
    		return $_SERVER["HTTP_X_FORWARDED"];
    	}
    	elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
    	{
    		return $_SERVER["HTTP_FORWARDED_FOR"];
    	}
    	elseif (isset($_SERVER["HTTP_FORWARDED"]))
    	{
    		return $_SERVER["HTTP_FORWARDED"];
    	}
    	else
    	{
    		return $_SERVER["REMOTE_ADDR"];
    	}    	 
    }
    
}
