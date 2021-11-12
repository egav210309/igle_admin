<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Apptablasdetalle;

class App_tablas_detalle extends Model{

	protected $table      = 'app_tablas_detalle'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = Apptablasdetalle::class; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre_detalle', 'id_tabla', 'extras'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    //nombre del estatus
    public function nameestadoescuela(string $value){
        $Usuario = $this->db->table('app_tablas_detalle');
        $Usuario->where('id_tabla',  3);
        $Usuario->where('id',  $value);
        return $Usuario->get()->getResult();
        
    }

}