<?php 
namespace App\Models;

use CodeIgniter\Model;

class CasadepazModel extends Model{

	protected $table      = 'casesdepaz'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id_cdp'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = 'object'; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre_cdp','direccion_cdp', 'ubicacion', 'dia_que_realiza', 'hora'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}