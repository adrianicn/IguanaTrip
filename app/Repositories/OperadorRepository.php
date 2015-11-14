<?php

namespace App\Repositories;

use App\Models\Usuario_Operador;
use Illuminate\Http\Request;
use App\Models\Catalogo_Servicio_Establecimiento;
use App\Models\Usuario_Servicio;
use App\Models\Servicio_Establecimiento_Usuario;

class OperadorRepository extends BaseRepository
{

	/**
	 * The Role instance.
	 *
	 * @var App\Models\Usuario_Operador
	 */
	protected $operador;
	protected $ServicioEstablecimiento;
	protected $UsuarioServicio;
	

	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\User $user
	 * @param  App\Models\Role $role
	 * @return void
	 */
	public function __construct(  )
	{
		$this->model = new Usuario_Operador();
		$this->servicioEstablecimiento = new Catalogo_Servicio_Establecimiento();
		$this->usuarioServicio = new Usuario_Servicio();
		$this->servicioEstablecimientoUsuario = new Servicio_Establecimiento_Usuario();
	}

	/**
	 * Save the Operador.
	 *
	 * @param  App\Models\Usuario_Operador $operador
	 * @param  Array  $inputs
	 * @return void
	 */
	private function save($operador, $inputs)
	{
		$operador->nombre_empresa_operador = $inputs['nombre_empresa_operador'];
		$operador->nombre_contacto_operador_1 = $inputs['nombre_contacto_operador_1'];
		$operador->telf_contacto_operador_1 = $inputs['telf_contacto_operador_1'];
		$operador->ip_registro_operador = $inputs['ip_registro_operador'];
		$operador->email_contacto_operador = $inputs['email_contacto_operador'];
		$operador->direccion_empresa_operador = $inputs['direccion_empresa_operador'];
		$operador->id_usuario = $inputs['id_usuario'];
		$operador->estado_contacto_operador = $inputs['estado_contacto_operador'];
		$operador->id_tipo_operador = $inputs['id_tipo_operador'];
		$operador->save();
	}

	/**
	 * Get users collection paginate.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function index()
	{

	}


	/**
	 * Create a user.
	 *
	 * @param  array  $inputs
	 * @param  int    $confirmation_code
	 * @return App\Models\User
	 */
	public function store($inputs)
	{
		$operador = new $this->model;
		
		$this->save($operador, $inputs);
		
		return $operador;
		
	}

	/**
	 * Update a user.
	 *
	 * @param  array  $inputs
	 * @param  App\Models\User $user
	 * @return void
	 */
	public function update($inputs)
	{
		$operador = new $this->model;
		$operadorData = $operador::where('id_usuario_op',$inputs['id_usuario_op'])
									->update(['nombre_empresa_operador'=>$inputs['nombre_empresa_operador'],
											'nombre_contacto_operador_1'=>$inputs['nombre_contacto_operador_1'],
											'telf_contacto_operador_1'=>$inputs['telf_contacto_operador_1'],
											'email_contacto_operador'=>$inputs['email_contacto_operador'],
											'direccion_empresa_operador'=>$inputs['direccion_empresa_operador']
									]);
	}

	/**
	 * Get statut of authenticated user.
	 *
	 * @return string
	 */
	public function getOperador($id_usuario)
	{
		$operador = new $this->model;
		return $operador::where('id_usuario',$id_usuario)->get();
	}
	
	public function getOperadorTipo($id_usuario,$id_tipo_operador)
	{
		$operador = new $this->model;
		return $operador::where('id_usuario',$id_usuario)->where('id_tipo_operador',$id_tipo_operador)->get();
	}
	
	public function getLastIdInsert($inputs)
	{
		$operador = new $this->model;
		return $operador::where('nombre_empresa_operador',$inputs['nombre_empresa_operador'])
							->where('nombre_contacto_operador_1',$inputs['nombre_contacto_operador_1'])
							->where('telf_contacto_operador_1',$inputs['telf_contacto_operador_1'])
							->where('email_contacto_operador',$inputs['email_contacto_operador'])
							->where('direccion_empresa_operador',$inputs['direccion_empresa_operador'])->get();
	}
	
	/**
	 * Valid user.
	 *
	 * @param  bool  $valid
	 * @param  int   $id
	 * @return void
	 */
	public function valid($valid, $id)
	{
		$user = $this->getById($id);

		$user->valid = $valid == 'true';

		$user->save();
	}

	/**
	 * Destroy a user.
	 *
	 * @param  App\Models\User $user
	 * @return void
	 */
	public function destroyUser(User $user)
	{
		$user->comments()->delete();

		$user->delete();
	}

	/**
	 * Confirm a user.
	 *
	 * @param  string  $confirmation_code
	 * @return App\Models\User
	 */
	public function confirm($confirmation_code)
	{
		$user = $this->model->whereConfirmationCode($confirmation_code)->firstOrFail();

		$user->confirmed = true;
		$user->confirmation_code = null;
		$user->save();
	}
	
	public function getServicioEstablecimiento($id_catalogo_servicio)
	{
		$servicioEstablecimiento = new $this->servicioEstablecimiento;
		return $servicioEstablecimiento::where('id_catalogo_servicio',$id_catalogo_servicio)->get();
		
	}
	
	public function storeUsuarioServicio($inputs){
		$operador = new $this->model;
		
		$this->saveUsurioServicios($operador, $inputs);
		
		return $operador;
		
	}
	
	public function saveUsuarioServicios($usuarioServicio, $inputs)
	{
		return  $usuarioServicio::where('id',$inputs['id_usuario_servicio'])
									->update(['nombre_servicio'=>$inputs['nombre_servicio'],
											'detalle_servicio'=>$inputs['detalle_servicio'],
											'precio_desde'=>$inputs['precio_desde'],
											'precio_hasta'=>$inputs['precio_hasta'],
											'precio_anterior'=>$inputs['precio_anterior'],
											'precio_actual'=>$inputs['precio_actual'],
											'descuento_servico'=>$inputs['descuento_servico'],
											'direccion_servicio'=>$inputs['direccion_servicio'],
											'correo_contacto'=>$inputs['correo_contacto'],
											'pagina_web'=>$inputs['pagina_web'],
											'nombre_comercial'=>$inputs['nombre_comercial'],
											'tags'=>$inputs['tags'],
											'descuento_clientes'=>$inputs['descuento_clientes'],
											'tags_servicio'=>$inputs['tags_servicio']
									]);
	}

	public function saveServicioEstablecimientoUsuario( $servicio_establecimiento_usuario, $id_usuario_servicio )
	{
			
		foreach ($servicio_establecimiento_usuario as $value) {
			$serEstablecimientoUsuario = new $this->servicioEstablecimientoUsuario;
			
			$serEstablecimientoUsuario->id_usuario_servicio = $id_usuario_servicio;
			$serEstablecimientoUsuario->id_servicio_est = $value;
			$serEstablecimientoUsuario->estado_servicio_est_us = 1;
			$serEstablecimientoUsuario->save();
		}
		
	}
	
	public function storageUsuarioServicios( $inputs, $servicio_establecimiento_usuario, $id_usuario_servicio )
	{
		$usuarioServicio = new $this->usuarioServicio;
		
		$this->saveUsuarioServicios($usuarioServicio, $inputs);
		$this->saveServicioEstablecimientoUsuario( $servicio_establecimiento_usuario, $id_usuario_servicio );
		
		return $usuarioServicio;
		
	
	}
	
	public function getCatalogoServicioEstablecimiento($id_usuario_servicio)
	{
		$catalogoServicioEstablecimiento = new $this->servicioEstablecimiento;
		return $catalogoServicioEstablecimiento::where('id_usuario_servicio',$id_usuario_servicio)->get();
	}
}
