<?php 
namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\Usersmodel;
use App\Models\EstadocivilModel;

class Register extends BaseController{

	protected $configuraciones;

	public function _construct(){
		$this->configuraciones = config('Admin');
	}

	public function index(){
		$estadocivil = new EstadocivilModel();
		return view('Auth/register', [
			"estadocivil" => $estadocivil->findAll()
		]);
	}

	public function store(){


		$validation =  \Config\Services::validation();
		$validation->setRules([
			'first_name'		=> 'required|alpha_space',
			'secund_name'		=> 'required|alpha_space',
			'last_name'			=> 'required|alpha_space',
			'secundlast_name'	=> 'required|alpha_space',
			'usuario'			=> 'required|valid_email|is_unique[users.usuario]',
			'estadociv'			=> 'required|is_not_unique[estadocivil.id_estado]',
			'password'			=> 'required|matches[repeatpassword]',
			'repeatpassword'	=> 'required'
		]);
		if(!$validation->withRequest($this->request)->run()){
			//dd($validation->getErrors());
			return redirect()->back()->withInput()->with('errors', $validation->getErrors());
		}
		$Usuario = new Usersmodel();
		$configur = new \Config\Admin();
		$user = new User($this->request->getPost());
		$user->generateUsername();
		$Usuario->identGroup($configur->defaultGroupUsers);
		$Usuario->identEstado($configur->defaultEstadUsers);
		$Usuario->save($user);
		
		return redirect()->route('login')
						->with('msg', [
							'type' => 'success',
							'body' => 'Usuario registrado con éxito!'
						]);
	}

	public function copia(){
		$Usuario = new Usersmodel();
		$configur = new \Config\Admin();
		$data = [
			"usuario"		 	=> "testeo@gmail.com",
			"first_name"	 	=> "Luis",
			"secund_name "	 	=> "Fernando",
			"last_name"		 	=> "Gomez",
			"secundlast_name"	=> "Carrillo",
			"password"		 	=> "123",
			"telefono"		 	=> "56778899",
			"estadociv"		 	=> 2
		];
		$user = new User($data);
		$user->generateUsername();
		$Usuario->identGroup($configur->defaultGroupUsers);
		$Usuario->identEstado($configur->defaultEstadUsers);
		d(json_encode($user));
		//$Usuario->save($user);
	}

}