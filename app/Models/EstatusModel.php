<?php 
namespace App\Models;

use CodeIgniter\Model;

class EstatusModel extends Model{

	protected $table      = 'estadousuario'; // la tabla a la que esta amarrada
    protected $primaryKey = 'cod_estado'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = 'object'; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name_estado'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    //nombre del estatus
    public function nameGobierno(string $value){
        $Usuario = $this->db->table('estadousuario');
        $Usuario->where('cod_estado',  $value);
        return $Usuario->get()->getResult();
        
    }

}