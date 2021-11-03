<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class Areaserv extends Entity
{
	//genera link para editar
	public function getEditRegisterserv(){
		return base_url(route_to('editsettig', $this->id_area.'/4'));
	}
}