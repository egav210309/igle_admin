<?php 
namespace App\Models;

use CodeIgniter\Model;

class CasaAsignacionModel extends Model{

	protected $table      = 'casadepaz_asinacion'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id_cdp'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = 'object'; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_cdp','user_id', 'tipo_asignacion'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}