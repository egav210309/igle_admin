<?php 
namespace App\Models;

use CodeIgniter\Model;

class SubredesModel extends Model{

	protected $table      = 'redes_sub'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id_subred'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = 'object'; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name_estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}