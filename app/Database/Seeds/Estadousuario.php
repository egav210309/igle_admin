<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Estadousuario extends Seeder
{
    public function run()
    {   
    	$estad = [];
    	//redes
        $estad = [
        	[ 
	        	'name_estado'	=> 'activo',
	        	'created_at'	=> date('Y-m-d H:i:s'),
	        	'updated_at'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'name_estado'	=> 'inactivo',
	        	'created_at'	=> date('Y-m-d H:i:s'),
	        	'updated_at'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'name_estado'	=> 'pendiente',
	        	'created_at'	=> date('Y-m-d H:i:s'),
	        	'updated_at'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'name_estado'	=> 'baja',
	        	'created_at'	=> date('Y-m-d H:i:s'),
	        	'updated_at'	=> date('Y-m-d H:i:s')
	        ]
        ];
        // Using Query Builder
        $redesq = $this->db->table('estadousuario');
        $redesq->insertBatch($estad);
    }
}
