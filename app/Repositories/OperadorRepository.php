<?php

namespace App\Repositories;

use App\Models\Usuario_Operador;
use Illuminate\Http\Request;

class OperadorRepository extends BaseRepository
{

	/**
	 * The Role instance.
	 *
	 * @var App\Models\Usuario_Operador
	 */
	protected $operador;

	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\User $user
	 * @param  App\Models\Role $role
	 * @return void
	 */
	public function __construct( Usuario_Operador $operador )
	{
		$this->model = $operador;
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

}
