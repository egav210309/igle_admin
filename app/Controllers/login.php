<?php

namespace App\Controllers;

use App\Models\Usersmodel;

//if (!defined('BASEPATH')) exit('No direct script access allowed');

class login extends BaseController
{
    public function index()
    {
        if(!session()->is_logged){
            $mensaje = session('mensaje');
            $principal =    view('include/header_login').
                    view('include/footer_login').
                    view('login/iniciarsesion', ["mensaje" => $mensaje]);
            return $principal;      
        }
        return redirect()->route('admin');
        
    }

    //inicio de sesion
    public function login(){
        //validar que vengan llenos los campos
        if(!$this->validate([
            'email'     => 'required|valid_email',
            'password'  => 'required'
        ])){
            return redirect()->back()
            ->with('errors', $this->validator->getErrors())
            ->withInput();
        }

    	$usuario = trim($this->request->getVar('email'));
    	$password = trim($this->request->getVar('password'));
        //die("==>> " . $password);
    	$Usuario = new Usersmodel();

    	$existe = $Usuario->iniciarsesion(['usuario' => $usuario]);

        if(!$existe){
            return redirect()->back()
                    ->with('msg', [
                        'type' => 'danger',
                        'body' => 'Este usuario no se encuentra registrado'
                    ]);
        }
        $datosUsuario = $existe[0];

        $usuario = $Usuario->find($datosUsuario->user_id);
    	if($datosUsuario && password_verify($password, $datosUsuario->password)){
    		//guadamos variables de sesion
    		$session = session();
    		$session->set([
                "users_id" => $datosUsuario->user_id,
                "users" => $datosUsuario->usuario,
                "username" => $datosUsuario->username,
                "usuario" => $datosUsuario->first_name." ".$datosUsuario->last_name,
                "type" => $datosUsuario->type,
                "img_usuario" => $usuario->getLinkFoto(),
                "is_logged" => true
            ]);
			return redirect()->route('admin')->with('msg',[
    			"type" => "success",
    			"body" => "Bienvenido de nuevo " . $datosUsuario->username
    		]);

    	} else {
    		return redirect()->back()
                    ->with('msg', [
                        'type' => 'danger',
                        'body' => 'Contrase??a incorrecta'
                    ]);
    	}
    }
            //cerrar sesi??n
    public function signout(){
        $session = session();
        $session->destroy();
        return redirect()->route('login')->
                with('msg',[
                    'type' => 'success',
                    'body' => 'Has cerrado sesi??n con ??xito.'
                ]);

    }

}