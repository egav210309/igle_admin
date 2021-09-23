<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IniSeeder extends Seeder
{
    public function run()
    {
		$data = [];
        $data = [
            [
	            'usuario' => "eduardo.rodriguezvc@gmail.com",
	            'password' => password_hash("egav2103", PASSWORD_DEFAULT),
	            'type' => 1
	        ],
	        [
	            'usuario' => "edgarveliz@gmail.com",
	            'password' => password_hash("vk123", PASSWORD_DEFAULT),
	            'type' => 1
	        ]
        ];
        // Using Query Builder
        $usersq = $this->db->table('users');
        $usersq->insertBatch($data);


    }
}
