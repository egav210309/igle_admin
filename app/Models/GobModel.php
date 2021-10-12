<?php 
namespace App\Models;

use CodeIgniter\Model;

class GobModel extends Model{

	protected $table      = 'gobierno'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id_gobierno'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = 'object'; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function allgroup(){
        $grupos = $this->db->table('gobierno');
        return $grupos->get()->getResult();
    }

    public function getGobName($idgob){
        $gobierno = $this->db->table('gobierno')->where('id_gobierno', $idgob);
        return $gobierno->get()->getResult();
    }
}