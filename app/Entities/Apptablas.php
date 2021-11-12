<?php 
namespace App\Entities;

use CodeIgniter\Entity;

class Apptablas extends Entity
{

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];


}