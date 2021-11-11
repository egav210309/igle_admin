<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Casapaz;
use App\Entities\Casasig;

class CasadepazModel extends Model{

	protected $table      = 'casesdepaz'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id_cdp'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = Casapaz::class; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre_cdp','direccion_cdp', 'ubicacion', 'dia_que_realiza', 'hora', 'cod_estatus', 'telefonos'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $infoAsign;
    protected $userId;
    protected $afterInsert  = ['asignacioCasa'];

    protected function asignacioCasa($data){
        $this->infoAsign->id_cdp = $data['id'];
        $model = model('CasaAsignacionModel');
        $model->insert($this->infoAsign);
    }

    public function asignarCasadepaz(Casasig $ui){
        $this->infoAsign = $ui;
    }
    //obtenermos el ultimo ID de casa de paz para asignarlo al segundo líder
    public function getIdCasa(){
        $db = db_connect();
        $query = $db->query("SELECT id_cdp FROM casesdepaz ORDER BY id_cdp DESC LIMIT 1");
        $result = $query->getRow();
        return $result;
    }
    //asignamos casa de paz al segundo líder
    public function asigSubLider($dataasig){
        $model = model('CasaAsignacionModel');
        $model->insert($dataasig);
    }
    //obtener los
    public function getNameLider(){
        $db = db_connect();
        $query = $db->query("SELECT id_cdp FROM casadepaz_asinacion ORDER BY id_cdp DESC LIMIT 1");
        $result = $query->getRow();
        return $result;
    }

    //actualizamos los líderes asignados
    public function eliminAsigcdp($idcdp){
        $db = db_connect();
        $query = $db->query("DELETE from casadepaz_asinacion WHERE id_cdp = '$idcdp'");

    }


}