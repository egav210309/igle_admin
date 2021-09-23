<?php 
namespace App\Entities;

use CodeIgniter\Entity;

/**
 * 
 */
class User extends Entity
{
	//para generar correctamente la contraseña
	protected function setPassword(string $password){
		$this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
	}
	//para generar automaticamente un usuario
	public function generateUsername(){
		$this->attributes['username'] = substr(strtolower($this->first_name, 0, 3)) . explode(" ", strtolower($this->last_name))[0];
	}
}
	
