<?php

namespace App\Controllers\Admin;
use App\Models\Usersmodel;
use App\Models\SubredesModel;
use App\Models\EscuelaModel;    

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    //pantalla ptincipal
    public function index()
    {   
        $personas       = new Usersmodel();
        $subredes       = new SubredesModel();
        $escuela        = new EscuelaModel();
        return view('Admin/dashboard', [
            'personas'      =>  $personas->findAll(),
            'pendientes'    =>  $personas->where('cod_estado', '3')->findAll(),
            'subredes'      => $subredes->findAll(),
            'escuela'  =>  $escuela->orderBy('id_escuela', 'asc')->findAll()
        ]);

    }

}
