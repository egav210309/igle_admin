<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class Casapaz extends Entity
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
		return base_url(route_to('cdp_edit', $this->id_cdp));
	}
	//obtener los lideres de la casa de paz
	public function getlideres(){
		if(!empty($this->attributes['id_cdp'])){
			$asignacion = model('CasaAsignacionModel');
			$lideres = $asignacion->getLiderAsig($this->attributes['id_cdp']);
			$nombreslideres = "";
			$tipoasig  = "";
			foreach ($lideres as $dat) {
				$tipoasig = "";
				$asig = model('GobModel');
				$tipoasig = $asig->getGobName($dat->tipo_asignacion)[0]->nombre;
				$nombreslideres .= "<li>".$dat->first_name. " " . $dat->last_name ." (".$tipoasig.") </li>" ;
			}
			return $nombreslideres;
		}
		return $this;
	}
}