<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Escuelaporpersona;

class EscuelaporpersonaModel extends Model{

	protected $table      = 'escueladelavisionporuser'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = Escuelaporpersona::class; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_escuela','user_id', 'observaciones_escuela', 'estado_escuela', 'anio', 'fecha_completada'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}