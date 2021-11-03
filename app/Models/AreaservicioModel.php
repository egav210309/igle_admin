<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Areaserv;

class AreaservicioModel extends Model{

	protected $table      = 'areasdeservicio'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id_area'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = Areaserv::class; // como va a devolver las funciones
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre_area'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}