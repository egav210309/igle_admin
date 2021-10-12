<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    //pantalla ptincipal
    public function index()
    {
        return view('Admin/dashboard');
    }

}
