<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\Usersmodel;
use App\Models\EstadocivilModel;
use App\Models\GroupsModel;
use App\Models\EstatusModel;
use App\Models\SubredesModel;
use App\Models\GobModel;
use App\Models\CasadepazModel;


class Pueblo extends BaseController
{

    //pantalla ptincipal
    public function index(){	
    	$redes = new SubredesModel();
    	$configur = new \Config\Admin();

        return view('Admin/redes_vista', [
	    	'active'	=> 	1000,
			'seccion'	=> 	1040,
			'title'		=> 	"",
        	'redes'	=>	$redes->orderBy('user_id', 'asc')->findAll()
        ]);
    }
}