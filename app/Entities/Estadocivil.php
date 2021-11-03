<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class Estadocivil extends Entity
{
	//genera link para editar
	public function getEditRegisterCivil(){
		return base_url(route_to('editsettig', $this->id_estado.'/3'));
	}
}