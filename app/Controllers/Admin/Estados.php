<?php

namespace App\Controllers\Admin;
use App\Models\EstatusModel;  

use App\Controllers\BaseController;

class Estados extends BaseController
{
    //pantalla ptincipal
    public function index()
    {   
        $status     = new EstatusModel();
        
        return view('Admin/gobierno', [
            'active'    =>  7000,
            'seccion'   =>  7010,
            'gobierno'      =>   ""
        ]);

    }

}
