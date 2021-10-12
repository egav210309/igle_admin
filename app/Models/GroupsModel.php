<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\User;
 
class GroupsModel extends Model{

	protected $table      = 'groups'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id_group'; // campo de llave primaria
    protected $allowedFields = ['name_group'];
    protected $useTimestamps = true;
    protected $returnType     = 'object'; // como va a devolver las funciones

    //busca el grupo al que pertenece el registro
	public function getRole(string $value){
        $Usuario = $this->db->table('groups');
        $Usuario->where('id_group',  $value);
        return $Usuario->get()->getResult();
		
	}
    
}