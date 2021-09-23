<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Redes extends Seeder
{
    public function run()
    {   
    	$redes = [];
    	//redes
        $redes = [
        	[ 
	        	'nombre_red'	=> 'Barak',
	        	'create_at'	=> date('Y-m-d H:i:s'),
	        	'update_at'	=> date('Y-m-d H:i:s')
	        ]
        ];
        // Using Query Builder
        $redesq = $this->db->table('redes');
        $redesq->insertBatch($redes);
    }
}
