<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Casasig;

class CasaAsignacionModel extends Model{

	protected $table      = 'casadepaz_asinacion'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = Casasig::class; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_cdp','user_id', 'tipo_asignacion'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getLiderAsig(string $idcdp){

        $Usuario = $this->db->table('casadepaz_asinacion');
        $Usuario->join('users', 'users.user_id = casadepaz_asinacion.user_id');
        $Usuario->where('casadepaz_asinacion.id_cdp', $idcdp);
        $datauser = $Usuario->get()->getResult();
        if($datauser){ 
          return $datauser;
        } else {
            return false;
        }
        return $usuariolider->get()->getResult();
    }

    public function liderByCdp($idcdp){
        $asignados = $this->db->table('casadepaz_asinacion');
        $asignados->where('id_cdp', $idcdp);
        $asignados->orderBy('id', 'ASC');
        return $asignados->get()->getResult();
    }
}