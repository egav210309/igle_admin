<?php 
namespace App\Models;

use CodeIgniter\Model;

class EstadocivilModel extends Model{

	protected $table      = 'estadocivil'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id_estado'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = 'object'; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name_estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}