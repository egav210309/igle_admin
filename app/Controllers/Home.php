<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->route('index');
    }
    //pantalla ptincipal
    public function inicio(){
        /*$this->data["dataejemplo"] = "test";
        $principal =    view('include/header').
                        view('include/footer').
                        view('dashboard', $this->data); */
        $principal =    view('include/header').
                        view('include/footer').
                        view('dashboard');
        return $principal;
    }


}
