<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity
{

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

	//para generar correctamente la contraseña
	protected function setPassword(string $password){
		$this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
	}
	//para generar automaticamente un usuario
	public function generateUsername(){
		$nombre = strtolower($this->first_name);
		$random = rand(10,1000);
		$this->attributes['username'] = substr($nombre, 0, 3) . explode(" ", strtolower($this->last_name))[0].$random;
	}
	//genera link para editar
	public function getEditRegister(){
		return base_url(route_to('user_edit', $this->user_id));
	}

	public function getGobierno(){
		if(!empty($this->attributes['id_gobierno'])){
			$gobierno = model('GobModel');
			return $gobierno->getGobName($this->attributes['id_gobierno'])[0]->nombre;
		}
		return $this;
	}

	public function getEstatus(){
		if(!empty($this->attributes['cod_estado'])){
			$status = model('EstatusModel');
			return $status->nameEstatus($this->attributes['cod_estado'])[0]->name_estado;
		}
		return $this;
	}
	//links de fotos del usuario
	public function getLinkFoto(){
		return base_url('public/fotografias/'. $this->fotografia);
	}
}
	
