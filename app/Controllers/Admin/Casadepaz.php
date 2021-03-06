<?php

namespace App\Controllers\Admin;
use App\Entities\Casapaz;
use App\Entities\Casasig;
use App\Models\Usersmodel;
use App\Models\EstadocivilModel;
use App\Models\GroupsModel;
use App\Models\EstatusModel;
use App\Models\SubredesModel;
use App\Models\GobModel;
use App\Models\CasadepazModel;
use App\Models\CasaAsignacionModel;
use App\Models\DiasSemana;  

use App\Controllers\BaseController;

class Casadepaz extends BaseController
{
    //pantalla ptincipal
    public function index(){   
        $cdp        = new CasadepazModel();
        $configur = new \Config\Admin();

        return view('Casadepaz/casadepaz', [
            'active'    =>  2000,
            'seccion'   =>  2010,
            'title'     =>  "",
            'cdp'       =>  $cdp->orderBy('id_cdp', 'asc')->findAll()
        ]);

    }
    //Vista de creación CDP
    public function create() {  
        $status     = new EstatusModel();
        $user        = new Usersmodel();
        $asign  = new GobModel();
        $diasemana   = new DiasSemana();

        return view('Casadepaz/casadepaz_create', [
            'active'        =>  2000,
            'seccion'       =>  2020,
            'usuarios'      => $user->where('cod_estado', '1')->findAll(),
            'tipo'          => $asign->allgroup(),
            'status'        => $status->findAll(),
            'diasemana'     => $diasemana->findAll()
        ]);
    }
    //Funcionalidad para guardar el registro de la casa de paz
    public function store(){
        $datasublider = array();
        /*dd(json_encode($this->request->getPost()));
        die();*/
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nombre_cdp'       => 'required|max_length[250]',
            'direccion_cdp'    => 'required',
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

        $cdp        = new CasadepazModel();

        //insertamos la casa de paz
        $casa       = new Casapaz($this->request->getPost());
        $casasub    = new Casapaz($datasublider);
        //insertamos las asignaciones de la casa
        //líder
        $casAsign = new Casasig($this->request->getPost());
        $cdp->asignarCasadepaz($casAsign);
        $cdp->save($casa);

        //sublider
        $idcasa = $cdp->getIdCasa();
        $datasublider = [
            'id_cdp'            =>  $idcasa->id_cdp,
            'user_id'           =>  $this->request->getVar('seg_user_id'),
            'tipo_asignacion'   =>  $this->request->getVar('seg_tipo_asignacion')
        ];
        $cdp->asigSubLider($datasublider);        
        
        return redirect('cdp')
                        ->with('msg', [
                            'type' => 'success',
                            'body' => 'Casa de Paz registrada con éxito!'
                        ]);
    }
    //Formulario para editar los registros
    public function edit(string $id){
        $model      = new CasadepazModel();
        $status     = new EstatusModel();
        $user       = new Usersmodel();
        $asign      = new GobModel();
        $liderasg   = new CasaAsignacionModel();
        $diasemana   = new DiasSemana();
        //verificamos si encontro el usuario en la base de datos
        if(!$casa = $model->find($id)){
            //de caso no encontrarlo, devuelve error 404
            throw PageNotFoundException::forPageNotFound();
        }
        /*dd($liderasg->liderByCdp($id));
        die();*/
        return view('Casadepaz/casadepaz_edit',[
            'casa'       => $casa,
            'status'        => $status->findAll(),
            'usuarios'      => $user->where('cod_estado', '1')->findAll(),
            'tipo'          => $asign->allgroup(),
            'liderasig'     => $liderasg->liderByCdp($id),
            'diasemana'     => $diasemana->findAll()
        ]);
    }
    //funcionalidad para actualizar los registros
    public function update(){

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_cdp'            => 'required|is_not_unique[casesdepaz.id_cdp]',
            'nombre_cdp'        => 'required',
            'cod_estatus'       => 'required'
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()
                            ->with('msg', [
                                'type' => 'danger',
                                'body' => 'Tienes campos incorrectos!'
                            ])
                            ->with('errors', $validation->getErrors());
        }
        $idcdp = trim($this->request->getVar('id_cdp'));
        $cdp    = new CasadepazModel();
        $user   = $cdp->find($this->request->getVar('id_cdp'));
        $tem = $cdp->eliminAsigcdp($idcdp);

        $cdp->save([
            'id_cdp'  =>  trim($this->request->getVar('id_cdp')),
            'nombre_cdp'   =>  trim($this->request->getVar('nombre_cdp')),
            'direccion_cdp'   =>  trim($this->request->getVar('direccion_cdp')),
            'ubicacion'    =>  trim($this->request->getVar('ubicacion')),
            'telefonos'    =>  trim($this->request->getVar('telefonos')),
            'dia_que_realiza'   =>  trim($this->request->getVar('dia_que_realiza')),
            'hora'     =>  trim($this->request->getVar('hora')),
            'cod_estatus'   =>  intval($this->request->getVar('cod_estatus'))
        ]);
        
        //actualizamos los líderes asignados en la casa de paz
        //lider
        $datalider = [
            'id_cdp'            =>  $idcdp,
            'user_id'           =>  $this->request->getVar('user_id'),
            'tipo_asignacion'   =>  $this->request->getVar('tipo_asignacion')
        ];
        $cdp->asigSubLider($datalider);

        //sublider
        $datasublider = [
            'id_cdp'            =>  $idcdp,
            'user_id'           =>  $this->request->getVar('seg_user_id'),
            'tipo_asignacion'   =>  $this->request->getVar('seg_tipo_asignacion')
        ];
        $cdp->asigSubLider($datasublider);       
        
        return redirect('cdp')->with('msg', [
                            'type' => 'success',
                            'body' => 'Modificación realizada con éxito!'
                        ]);                 
    }

}