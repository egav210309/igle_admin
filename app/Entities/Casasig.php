<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class Casasig extends Entity
{

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

	public function getUserId(){
		return $this->user_id;
	}

}