<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\User;

class Usersmodel extends Model{

	protected $table      = 'users'; // la tabla a la que esta amarrada
    protected $primaryKey = 'user_id'; // campo de llave primaria
    protected $useAutoIncrement = true;
    //protected $returnType     = 'array';
    protected $returnType     = User::class; // como va a devolver las funciones
    protected $useSoftDeletes = false;

    protected $allowedFields = [
                            'first_name', 'last_name', 'password', 'username', 'type', 'usuario', 'fecha_nacimiento',
                            'cod_estado', 'secund_name', 'secundlast_name', 'apell_casada', 'estadociv', 'telefono',
                            'fecha_nacimiento', 'direccion', 'id_gobierno', 'id_subred', 'casadepaz', 
                            'informacionadicional', 'id_cdp', 'fotografia' 
                        ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $beforeInsert = ['addGroup', 'addEstado'];
	
    protected $assignGroup;
    protected $assignEstado;

    protected function addGroup($data){
        $data['data']['type'] = $this->assignGroup;
        return $data;
    }
    protected function addEstado($data){
        $data['data']['cod_estado'] = $this->assignEstado;
        return $data;
    }

    //para identificar el grupo del usuario
    public function identGroup(string $group){
    	$row = $this->db->table('groups')
    			->where('name_group', $group)
    			->get()->getFirstRow();
		if($row){
			$this->assignEstado = $row->id_group;
		} 
    }
    //para identificar el estado del registro
    public function identEstado(string $estado){
        $row = $this->db->table('estadousuario')
                ->where('name_estado', $estado)
                ->get()->getFirstRow();
                
        if($row){
            $this->assignGroup = $row->cod_estado;
        } 
    }

	//validar para iniciar sesi??n
	public function iniciarsesion($data){

		$Usuario = $this->db->table('users');
		$Usuario->where($data);
        $datauser = $Usuario->get()->getResult();
        if($datauser){ 
		  return $datauser;
        } else {
            return false;
        }
	}

    public function getUser(string $column, string $value){
        $Usuario = $this->db->table('users');
        $Usuario->where($column,  $value);
        return $Usuario->get()->getResult();
    }
    
}

?>