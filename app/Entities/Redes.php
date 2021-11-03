<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class Redes extends Entity
{

	//genera link para editar
	public function getEditRegisterred(){
		return base_url(route_to('red_edit', $this->id_subred));
	}
}