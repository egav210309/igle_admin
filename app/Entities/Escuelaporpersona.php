<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class Escuelaporpersona extends Entity
{

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

	public function getEstatus(){

		if(!empty($this->attributes['estado_escuela'])){
			$status = model('App_tablas_detalle');
			return $status->nameestadoescuela($this->attributes['estado_escuela'])[0]->nombre_detalle;
		}
		return $this;
	}

	//genera link para editar
	public function getEditRegister(){
		return base_url(route_to('registroescuela_edit', $this->id));
	}

	//obtener los lideres 
	public function getlideres(){
		if(!empty($this->attributes['user_id'])){
			$model = model('Usersmodel');
          	$users = $model->getUser('user_id', $this->attributes['user_id'])[0];
          	$estudiante = $users->first_name." ".$users->secund_name." ".$users->last_name." ".$users->secundlast_name;
			return $estudiante;
		}
		return $this;
	}

	//obtener la escuela 
	public function getescuela(){
		if(!empty($this->attributes['id_escuela'])){
			$model = model('EscuelaModel');
          	$data = $model->getEscuela('id_escuela', $this->attributes['id_escuela'])[0];
          	$escuela = $data->nombre_escuela;
			return $escuela;
		}
		return $this;
	}
}