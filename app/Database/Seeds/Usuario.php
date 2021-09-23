<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Usuario extends Seeder
{
    public function run()
    {   
        $email = "admin";
        $password = password_hash("123", PASSWORD_DEFAULT)
        $type = "admin";

        $data = [
                'password' => $password,
                'email'    => $email,
                'type'     => $type 
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
