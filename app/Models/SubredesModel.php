<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Redes;

class SubredesModel extends Model{

	protected $table      = 'redes_sub'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id_subred'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = Redes::class; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name_estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}