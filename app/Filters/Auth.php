<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\Usersmodel;
use App\Models\GroupsModel;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {

        if(!session()->is_logged){
        	return redirect()->route('login')->with('msg', [
                'type'  => 'warning',
                'body'  =>  'Para accesar al sistema debes de iniciar sesión'
            ]);
        }
        
        $model = new Usersmodel();
        $user = $model->iniciarsesion(['user_id' => session()->users_id])[0];
        $users = $model->getUser('user_id', session()->users_id)[0];

        if(!$user){
            $session = session();
            $session->destroy();
            return redirect()->route('login')
                ->with('msg', [
                'type'  => 'danger',
                'body'  =>  'El usuaior actualmente no esta disponible'
            ]);
        }

        $grupo = new GroupsModel();
        $grupo = $grupo->getRole($users->type)[0]->name_group;

        if(!in_array($grupo, $arguments)){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();   
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}