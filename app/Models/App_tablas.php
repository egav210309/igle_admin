<?php 
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Apptablas;

class App_tablas extends Model{

	protected $table      = 'app_tablas'; // la tabla a la que esta amarrada
    protected $primaryKey = 'id'; // campo de llave primaria

    protected $useAutoIncrement = true;

    protected $returnType     = Apptablas::class; // como va a devolver las funciones
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre_tabla'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}