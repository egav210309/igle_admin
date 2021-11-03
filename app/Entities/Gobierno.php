<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class Gobierno extends Entity
{

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

	//genera link para editar
	public function editarRegistroGob(){
		return base_url(route_to('gobierno_edit', $this->id_gobierno.'/1'));
	}
}