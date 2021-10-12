<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class Estatus extends Entity
{
	public function getNameEstatus(){
		return $this->name_estado;
	}

}