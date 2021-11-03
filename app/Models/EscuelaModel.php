<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Escuelavision;
use App\Entities\Escuelaporpersona;

class EscuelaModel extends Model{

	protected $table      = 'escueladelavision'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id_escuela'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = Escuelavision::class; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre_escuela','direccion_esc', 'dia_que_realiza', 'hora', 'cod_estatus', 'telefonos'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $infoAsign;
    protected $userId;
    protected $afterInsert  = ['asignacioEscuela'];

    protected function asignacioEscuela($data){
        $this->infoAsign->id_escuela = $data['id'];
        $model = model('EscuelaporpersonaModel');
        $model->insert($this->infoAsign);
    }

    public function asignarEscuela(Escuelaporpersona $ui){
        $this->infoAsign = $ui;
    }
}