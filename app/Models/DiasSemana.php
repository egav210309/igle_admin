<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Diasdesemana;

class DiasSemana extends Model{

	protected $table      = 'diasdelasemana'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id_dia'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = Diasdesemana::class; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['dia'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}