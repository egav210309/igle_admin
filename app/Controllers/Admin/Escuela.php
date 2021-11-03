<?php

namespace App\Controllers\Admin;
use App\Entities\Escuelavision;
use App\Entities\Escuelaporpersona;
use App\Models\Usersmodel;
use App\Models\EstadocivilModel;
use App\Models\GroupsModel;
use App\Models\EstatusModel;
use App\Models\SubredesModel;
use App\Models\GobModel;
use App\Models\EscuelaModel;
use App\Models\EscuelaporpersonaModel;  

use App\Controllers\BaseController;

class Escuela extends BaseController{

    //pantalla ptincipal
    public function index(){   
        $escuela        = new EscuelaModel();
        $configur = new \Config\Admin();

        return view('Escuelas/escuela', [
            'active'    =>  3000,
            'seccion'   =>  3010,
            'title'     =>  "",
            'escuela'  =>  $escuela->orderBy('id_escuela', 'asc')->findAll()
        ]);
    }
    //Vista de creación de escuela de la visión
    public function create() {  
        $status     = new EstatusModel();
        $user        = new Usersmodel();
        $asign  = new GobModel();

        return view('Escuelas/escuela_create', [
            'active'    	=>  3000,
            'seccion'   	=>  3020,
            'usuarios'      => $user->where('cod_estado', '1')->findAll(),
            'tipo'          => $asign->allgroup(),
            'status'        => $status->findAll()
        ]);
    }
        //Funcionalidad para guardar el registro de la Escuela
    public function store(){

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nombre_escuela'   => 'required|alpha_space|max_length[250]',
            'direccion_esc'    => 'required',
            'cod_estatus'      => 'required',
            'user_id'          => 'required',
            'tipo_asignacion'  => 'required'
        ]);
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()
                            ->with('msg', [
                                'type' => 'danger',
                                'body' => 'Tienes campos incorrectos!'
                            ])
                            ->with('errors', $validation->getErrors());
        }

        $escuela        = new EscuelaModel();
        //insertamos la Escuela
        $escu       = new Escuelavision($this->request->getPost());

        //insertamos la asignacion de la casa
        $escuelaAsign = new Escuelaporpersona($this->request->getPost());
        $escuela->asignarEscuela($escuelaAsign);

        $escuela->save($escu);

        return redirect('escuela')
                        ->with('msg', [
                            'type' => 'success',
                            'body' => 'Escuela de la visión registrada con éxito!'
                        ]);
    }
    //Formulario para editar los registros
    public function edit(string $id){
        $model = new EscuelaModel();
        $status     = new EstatusModel();

        //verificamos si encontro el usuario en la base de datos
        if(!$escuela = $model->find($id)){
            //de caso no encontrarlo, devuelve error 404
            throw PageNotFoundException::forPageNotFound();
        }

        return view('Escuelas/escuela_edit',[
            'escuela'       => $escuela,
            'status'        => $status->findAll()
        ]);
    }
    //funcionalidad para actualizar los registros
    public function update(){

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_escuela'            => 'required|is_not_unique[escueladelavision.id_escuela]',
            'nombre_escuela'        => 'required',
            'cod_estatus'       	=> 'required'
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()
                            ->with('msg', [
                                'type' => 'danger',
                                'body' => 'Tienes campos incorrectos!'
                            ])
                            ->with('errors', $validation->getErrors());
        }

        $escuela    = new EscuelaModel();
        $user   = $escuela->find($this->request->getVar('id_escuela'));

        $escuela->save([
            'id_escuela'  =>  trim($this->request->getVar('id_escuela')),
            'nombre_escuela'   =>  trim($this->request->getVar('nombre_escuela')),
            'direccion_esc'   =>  trim($this->request->getVar('direccion_esc')),
            'telefonos'    =>  trim($this->request->getVar('telefonos')),
            'dia_que_realiza'   =>  trim($this->request->getVar('dia_que_realiza')),
            'hora'     =>  trim($this->request->getVar('hora')),
            'cod_estatus'   =>  intval($this->request->getVar('cod_estatus'))
        ]);
        
        return redirect('escuela')
        		->with('msg', [
                    'type' => 'success',
                    'body' => 'Modificación realizada con éxito!'
                ]);                 
    }

}