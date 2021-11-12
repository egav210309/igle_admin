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
use App\Models\App_tablas_detalle;  

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
            'nombre_escuela'   => 'required|max_length[250]',
            'cod_estatus'      => 'required'
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
        //$escuelaAsign = new Escuelaporpersona($this->request->getPost());
        //$escuela->asignarEscuela($escuelaAsign);

        $escuela->save($escu);

        return redirect('escuela')
                        ->with('msg', [
                            'type' => 'success',
                            'body' => 'Escuela de la visión creada con éxito!'
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
            'observac_escuela'   =>  trim($this->request->getVar('observac_escuela')),
            'cod_estatus'   =>  intval($this->request->getVar('cod_estatus'))
        ]);
        
        return redirect('escuela')
        		->with('msg', [
                    'type' => 'success',
                    'body' => 'Modificación realizada con éxito!'
                ]);                 
    }
        //pantalla ptincipal
    public function lista_registros(){   
        $escuela        = new EscuelaporpersonaModel();
        $configur = new \Config\Admin();

        return view('Escuelas/escuela_registros', [
            'active'    =>  3000,
            'seccion'   =>  3040,
            'title'     =>  "",
            'escuela'  =>  $escuela->orderBy('id', 'asc')->findAll()
        ]);
    }
    //Formulario para editar los registros
    public function edit_escuelacursada(string $id){
        $model       = new EscuelaporpersonaModel();
        $status      = new EstatusModel();
        $user        = new Usersmodel();
        $aniocurso   = new App_tablas_detalle();
        $escuela     = new EscuelaModel();

        //verificamos si encontro el usuario en la base de datos
        if(!$registro = $model->find($id)){
            //de caso no encontrarlo, devuelve error 404
            throw PageNotFoundException::forPageNotFound();
        }

        return view('Escuelas/escuela_registro_edit',[
            'active'        =>  3000,
            'seccion'       =>  3040,
            'usuarios'      => $user->where('cod_estado', '1')->findAll(),
            'aniocursado'   => $aniocurso->where('id_tabla', '2')->findAll(),
            'estatusescu'   => $aniocurso->where('id_tabla', '3')->findAll(),
            'escuelas'      => $escuela->findAll(),
            'status'        => $status->findAll(),
            'registro'      => $registro
        ]);
    }
    //registro de la escuela curzada por el lider
    public function registrarescuenta(){
        $status      = new EstatusModel();
        $user        = new Usersmodel();
        $aniocurso   = new App_tablas_detalle();
        $escuela     = new EscuelaModel();

        return view('Escuelas/escuela_registrar', [
            'active'        =>  3000,
            'seccion'       =>  3030,
            'usuarios'      => $user->where('cod_estado', '1')->findAll(),
            'aniocursado'   => $aniocurso->where('id_tabla', '2')->findAll(),
            'estatusescu'   => $aniocurso->where('id_tabla', '3')->findAll(),
            'escuelas'      => $escuela->findAll(),
            'status'        => $status->findAll()
        ]);
    }

    //registro de la escuela curzada por la persona
    public function registro_store(){

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_escuela'        => 'required',
            'user_id'           => 'required',
            'estado_escuela'    => 'required'
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()
                ->withInput()
                ->with('msg', [
                    'type' => 'danger',
                    'body' => 'Tienes campos incorrectos!'
                ])
                ->with('errors', $validation->getErrors());
        }

        //insertamos la asignacion de la casa
        $escuelaAsign = new EscuelaporpersonaModel();
        $aniocurs = intval($this->request->getVar('aniocursado'));
        if(!intval($this->request->getVar('aniocursado'))){
            $aniocurs = 0;
        }
        $escuelaAsign->save([
            'id_escuela'            =>  trim($this->request->getVar('id_escuela')),
            'user_id'               =>  trim($this->request->getVar('user_id')),
            'observaciones_escuela' =>  trim($this->request->getVar('observaciones_escuela')),
            'estado_escuela'        =>  intval($this->request->getVar('estado_escuela')),
            'anio'                  =>  $aniocurs,
            'fecha_completada'      =>  trim($this->request->getVar('fecha_completada'))
        ]);

        return redirect('registros_escuela')
                        ->with('msg', [
                            'type' => 'success',
                            'body' => 'La escuela cursada se registro con éxito!'
                        ]);
    }

    //actualiza el registro de la escuaela del estudiante
        //funcionalidad para actualizar los registros
    public function registro_update(){

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_registro'          => 'required|is_not_unique[escueladelavisionporuser.id]',
            'user_id'              => 'required',
            'id_escuela'           => 'required',
            'estado_escuela'       => 'required'
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()
                            ->with('msg', [
                                'type' => 'danger',
                                'body' => 'Tienes campos incorrectos!'
                            ])
                            ->with('errors', $validation->getErrors());
        }

        $escuela    = new EscuelaporpersonaModel();
        $user   = $escuela->find($this->request->getVar('id_registro'));

        $escuela->save([
            'id'                        =>  trim($this->request->getVar('id_registro')),
            'user_id'                   =>  trim($this->request->getVar('user_id')),
            'id_escuela'                =>  trim($this->request->getVar('id_escuela')),
            'anio'                      =>  intval($this->request->getVar('aniocursado')),
            'observaciones_escuela'     =>  trim($this->request->getVar('observaciones_escuela')),
            'estado_escuela'            =>  intval($this->request->getVar('estado_escuela')),
            'fecha_completada'          =>  trim($this->request->getVar('fecha_completada'))
        ]);
        
        return redirect('registros_escuela')
                ->with('msg', [
                    'type' => 'success',
                    'body' => 'Modificación realizada con éxito!'
                ]);                 
    }

}