<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class Escuelavision extends Entity
{

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

	public function getEstatus(){
		if(!empty($this->attributes['cod_estatus'])){
			$status = model('EstatusModel');
			return $status->nameEstatus($this->attributes['cod_estatus'])[0]->name_estado;
		}
		return $this;
	}
	//genera link para editar
	public function getEditRegister(){
		return base_url(route_to('escuela_edit', $this->id_escuela));
	}

}