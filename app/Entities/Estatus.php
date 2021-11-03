<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class Estatus extends Entity
{
	public function getNameEstatus(){
		return $this->name_estado;
	}
	//genera link para editar
	public function getEditRegisterst(){
		return base_url(route_to('editsettig', $this->cod_estado.'/2'));
	}
}