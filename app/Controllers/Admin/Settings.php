<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Gobierno;
use App\Models\Usersmodel;
use App\Models\EstadocivilModel;
use App\Models\GroupsModel;
use App\Models\EstatusModel;
use App\Models\SubredesModel;
use App\Models\GobModel;
use App\Models\CasadepazModel;
use App\Models\AreaservicioModel;

class Settings extends BaseController
{
    //pantalla ptincipal
    public function index() {}

    //Vista para el listado de registro de gobierno
    public function gobList(){
        $gobiernos  = new GobModel();

        return view('Admin/gobierno', [
            'active'    =>  7000,
            'seccion'   =>  7010,
            'gobierno'      =>   $gobiernos->allgroup()
        ]);
    }
    //Vista para el listado de registro de status
    public function statusList(){
        $status     = new EstatusModel();
        
        return view('Admin/estados_vista', [
            'active'    =>  7000,
            'seccion'   =>  7020,
            'status'        => $status->findAll(),
        ]);
    }
    //Vista para el listado de registro Estado civil
    public function estadocivilList(){
        $civil     = new EstadocivilModel();
        
        return view('Admin/estadocivil_vista', [
            'active'    =>  7000,
            'seccion'   =>  7030,
            'estadcivil'        => $civil->findAll(),
        ]);
    }
    //Vista para el listado de registro las areas de servicio
    public function servicioList(){
        $servicio     = new AreaservicioModel();
        
        return view('Admin/servicio_vista', [
            'active'    =>  7000,
            'seccion'   =>  7040,
            'areaservicio'        => $servicio->findAll(),
        ]);
    } 
    //Formulario para editar los registros
    public function edit(string $id, $tipo){
        
        die("==>> ".$tipo);
        switch ($tipo) {
            case 2: //status
                $model = new EstatusModel();
                //verificamos si encontro el usuario en la base de datos
                if(!$status = $model->find($id)){
                    //de caso no encontrarlo, devuelve error 404
                    throw PageNotFoundException::forPageNotFound();
                }
                return view('Admin/dashboard',[
                    'status'        => $status
                ]);
            break;
            case 3: // estado civil
            die("civil");
                $model = new EstadocivilModel();
                //verificamos si encontro el usuario en la base de datos
                if(!$civil = $model->find($id)){
                    //de caso no encontrarlo, devuelve error 404
                    throw PageNotFoundException::forPageNotFound();
                }
                return view('Admin/dashboard',[
                    'estadcivil'        => $civil
                ]);
            break;
            case 4: // Áreas de servicio
                $model = new EstadocivilModel();
                //verificamos si encontro el usuario en la base de datos
                if(!$civil = $model->find($id)){
                    //de caso no encontrarlo, devuelve error 404
                    throw PageNotFoundException::forPageNotFound();
                }
                return view('Admin/dashboard',[
                    'estadcivil'        => $civil
                ]);
            break;
            default:
                
            break;
        }




        
    }

}