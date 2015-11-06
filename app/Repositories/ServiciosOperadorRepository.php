<?php

namespace App\Repositories;

use App\Models\Usuario_Servicio;

class ServiciosOperadorRepository extends BaseRepository
{

	/**
	 * The Role instance.
	 *
	 * @var App\Models\Usuario Servicios
	 */	
	protected $userservicios;

	/**
	 * Create a new ServiciosOperadorRepository instance.
	 *
   	 * @param  App\Models\UserServicios $user
	 
	 * @return void
	 */
	public function __construct(
		Usuario_Servicio $userservicios
		)
	{
		$this->model = $userservicios;
		
	}

	/**
	 * Save the User.
	 *
	 * @param  App\Models\UserServicio $user_servicios
	 * @param  Array  $inputs
	 * @return void
	 */
  	private function save($user_servicios)
	{		

		$user_servicios->save();
	}

	/**
	 * Get users collection paginate.
	 *
	 * @param  int  $n
	 * @param  string  $role
	 * @return Illuminate\Support\Collection
	 */
	public function index($n, $role)
	{
		if($role != 'total')
		{
			return $this->model
			->with('role')
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})		
			->oldest('seen')
			->latest()
			->paginate($n);			
		}

		return $this->model
		->with('role')		
		->oldest('seen')
		->latest()
		->paginate($n);
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function count($role = null)
	{
		if($role)
		{
			return $this->model
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})->count();			
		}

		return $this->model->count();
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function counts()
	{
		$counts = [
			'admin' => $this->count('admin'),
			'redac' => $this->count('redac'),
			'user' => $this->count('user')
		];

		$counts['total'] = array_sum($counts);

		return $counts;
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
		$user_servicios = new $this->model;
                
                        $user_servicios->id_catalogo_servicio = $inputs['id_catalogo_servicio'];
			$user_servicios->id_usuario_operador = $inputs['id_usuario'];
                        
		$this->save($user_servicios);

		return $user_servicios;
	}

	/**
	 * Update a user.
	 *
	 * @param  array  $inputs
	 * @param  App\Models\User $user
	 * @return void
	 */
	public function update($inputs, $user)
	{		
		$user->confirmed = isset($inputs['confirmed']);

		$this->save($user, $inputs);
	}

	/**
	 * Get statut of authenticated user.
	 *
	 * @return string
	 */
	public function getStatut()
	{
		return session('statut');
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
	
	public function getServiciosOperador($id_usuario_operador)
	{
		$user_servicios = new $this->model;
		return $user_servicios::where('id_usuario_operador',$id_usuario_operador)->get();
	}
	

}
