<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    //pantalla ptincipal
    public function index()
    {
        $principal =    view('include/header').
                        view('include/footer').
                        view('dashboard');
        return $principal;
    }

}
