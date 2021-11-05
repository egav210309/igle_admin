<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\Usersmodel;
use App\Models\EstadocivilModel;
use App\Models\GroupsModel;
use App\Models\EstatusModel;
use App\Models\SubredesModel;
use App\Models\GobModel;
use App\Models\CasadepazModel;


class Pueblo extends BaseController
{
    //pantalla ptincipal
    public function index(){	
    	$personas = new Usersmodel();
    	$configur = new \Config\Admin();

        return view('Admin/pueblo', [
	    	'active'	=> 	1000,
			'seccion'	=> 	1010,
			'title'		=> 	"",
        	'personas'	=>	$personas->orderBy('user_id', 'asc')->findAll()
        ]);
    }

    //Vista de creación de persona
    public function create() {	
    	$groupmodel = new GroupsModel();
    	$estadmodel = new EstadocivilModel();
    	$status 	= new EstatusModel();
    	$subredes 	= new SubredesModel();
    	$gobiernos 	= new GobModel();
    	$cdp 		= new CasadepazModel();

        return view('Admin/pueblo_create', [
        	'grupos'		=> $groupmodel->findAll(),
        	'estadcivil'	=> $estadmodel->findAll(),
        	'status'		=> $status->findAll(),
        	'gobern'		=> $gobiernos->allgroup(),
        	'subredes'		=> $subredes->findAll(),
        	'cdp'			=> $cdp->findAll()
        ]);
    }
    //Funcionalidad para guardar el registro de persona
    public function store(){
		$validation =  \Config\Services::validation();
		$validation->setRules([
			'first_name'		=> 'required|alpha_space|max_length[20]',
			'secund_name'		=> 'required|alpha_space|max_length[20]',
			'last_name'			=> 'required|alpha_space|max_length[20]',
			'secundlast_name'	=> 'required|alpha_space|max_length[20]',
			'usuario'			=> 'required|valid_email|is_unique[users.usuario]',
			'estadociv'			=> 'required',
			'cod_estado'		=> 'required',
			'id_gobierno'		=> 'required',
			'fotografia'		=> 'uploaded[fotografia]|is_image[fotografia]',
			'password'			=> 'required|matches[repeatpassword]',
			'repeatpassword'	=> 'required'
		]);
		if(!$validation->withRequest($this->request)->run()){
			return redirect()->back()->withInput()
							->with('msg', [
								'type' => 'danger',
								'body' => 'Tienes campos incorrectos!'
							])
							->with('errors', $validation->getErrors());
		}
		//archivo de la fotografía
		$file = $this->request->getFile('fotografia');

		$Usuario = new Usersmodel();
		$configur = new \Config\Admin();
		$user = new User($this->request->getPost());
		$user->generateUsername();
		$user->fotografia = $file->getRandomname();

		$Usuario->identGroup($configur->defaultGroupUsers);
		$Usuario->identEstado($configur->defaultEstadUsers);
		$Usuario->save($user);
		
		$file->store('fotografias/', $user->fotografia);

		return redirect('pueblo')
						->with('msg', [
							'type' => 'success',
							'body' => 'Usuario registrado con éxito!'
						]);
    }
    //Formulario para editar los registros
    public function edit(string $id){
    	$model = new Usersmodel();
    	$groupmodel = new GroupsModel();
    	$estadmodel = new EstadocivilModel();
    	$status 	= new EstatusModel();
    	$gobiernos 	= new GobModel();
    	$subredes 	= new SubredesModel();
    	$cdp 		= new CasadepazModel();

    	//verificamos si encontro el usuario en la base de datos
    	if(!$usuario = $model->find($id)){
    		//de caso no encontrarlo, devuelve error 404
			throw PageNotFoundException::forPageNotFound();
    	}

    	return view('Admin/pueblo_edit',[
    		'usuario' => $usuario,
    		'grupos'	=> $groupmodel->findAll(),
    		'estadcivil'	=> $estadmodel->findAll(),
    		'status'		=> $status->findAll(),
    		'gobern'		=> $gobiernos->allgroup(),
        	'subredes'		=> $subredes->findAll(),
        	'cdp'			=> $cdp->findAll()
    	]);
    }
    //funcionalidad para actualizar los registros
    public function update(){

		$validation =  \Config\Services::validation();
		$validation->setRules([
			'userid'			=> 'required|is_not_unique[users.user_id]',
			'first_name'		=> 'required|alpha_space|max_length[20]',
			'last_name'			=> 'required|alpha_space|max_length[20]',
			'cod_estado'		=> 'required',
			'type'				=> 'required',
			'id_gobierno'		=> 'required',
			'estadociv'			=> 'required'
		]);
		if(!$validation->withRequest($this->request)->run()){
			return redirect()->back()->withInput()
							->with('msg', [
								'type' => 'danger',
								'body' => 'Tienes campos incorrectos!'
							])
							->with('errors', $validation->getErrors());
		}
		$cdp = 0;
		if(trim($this->request->getVar('cdpbool')) == true){
			$cdp = 1;
		}
		

		$Usuario = new Usersmodel();
		$user = $Usuario->find($this->request->getVar('userid'));
		//contraseña
		$passwordnew = password_hash(trim($this->request->getVar('password')), PASSWORD_DEFAULT);
		if(!empty($this->request->getVar('password'))){
			$Usuario->set([
				'password'	=>	$passwordnew
			]);
		};

		//archivo de la fotografía
		$imagenfoto = trim($this->request->getVar('namefile'));
		if($this->request->getVar('fotografia')){
			$file = $this->request->getFile('fotografia');
			$user->fotografia = $file->getRandomname();
			$file->store('fotografias/', $user->fotografia);
			$imagenfoto = $user->fotografia;		
		}

		$Usuario->save([
			'username'	=>	trim($this->request->getVar('username')),
			'usuario'	=>	trim($this->request->getVar('usuario')),
			'user_id'	=>	trim($this->request->getVar('userid')),
			'first_name'	=>	trim($this->request->getVar('first_name')),
			'secund_name'	=>	trim($this->request->getVar('secund_name')),
			'last_name'		=>	trim($this->request->getVar('last_name')),
			'secundlast_name'	=>	trim($this->request->getVar('secundlast_name')),
			'apell_casada'	=>	trim($this->request->getVar('apell_casada')),
			'telefono'		=>	trim($this->request->getVar('telefono')),
			'fecha_nacimiento'	=>	trim($this->request->getVar('fecha_nacimiento')),
			'estadociv'	=>	trim($this->request->getVar('estadociv')),
			'direccion'	=>	trim($this->request->getVar('direccion')),
			'fotografia'	=>	trim($this->request->getVar('fotografia')),
			'cod_estado'	=>	trim($this->request->getVar('cod_estado')),
			'type'	=>	trim($this->request->getVar('type')),
			'casadepaz'	=>	trim($this->request->getVar('casadepaz')),
			'id_gobierno'	=>	trim($this->request->getVar('id_gobierno')),
			'id_subred'	=>	trim($this->request->getVar('id_subred')),
			'id_gobierno'	=>	trim($this->request->getVar('id_gobierno')),
			'id_cdp'	=>	trim($this->request->getVar('id_cdp')),
			'informacionadicional'	=>	trim($this->request->getVar('observacion')),
			'fotografia'	=> $imagenfoto
		]);
		
		return redirect('pueblo')->with('msg', [
							'type' => 'success',
							'body' => 'Modificación realizada con éxito!'
						]);					
    }

    //listado de personas por autorizar
    public function porAutorizar(){
    	$personas = new Usersmodel();
    	$configur = new \Config\Admin();

        return view('Admin/pueblo_varias', [
	    	'active'	=> 	1000,
			'seccion'	=> 	1030,
			'title'		=> 	"por Autorizar",
        	'personas'	=>	$personas->where('cod_estado', '3')->orderBy('user_id', 'desc')->paginate($configur->regPerPage),
        	'pager'		=> 	$personas->pager
        ]);	
    }

    //listado de personas por autorizar
    public function deBajaInactiva(){
    	$personas = new Usersmodel();
    	$configur = new \Config\Admin();
    	$where = "cod_estado in('2' , '4')";
        return view('Admin/pueblo_varias', [
	    	'active'	=> 	1000,
			'seccion'	=> 	1020,
			'title'		=> 	"Baja / Inactivas",
        	'personas'	=>	$personas->where($where)->orderBy('user_id', 'desc')->paginate($configur->regPerPage),
        	'pager'		=> 	$personas->pager
        ]);	
    }

}