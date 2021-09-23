<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Estadocivil extends Seeder
{
    public function run()
    {   
        //para estados civil
        $estado = [
        	[ 
	        	'name_estado'	=> 'Soltero (a)',
	        	'create_at'	=> date('Y-m-d H:i:s'),
	        	'update_ad'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'name_estado'	=> 'Casado (a)',
	        	'create_at'	=> date('Y-m-d H:i:s'),
	        	'update_ad'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'name_estado'	=> 'Unido (a)',
	        	'create_at'	=> date('Y-m-d H:i:s'),
	        	'update_ad'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'name_estado'	=> 'Divorcioado (a)',
	        	'create_at'	=> date('Y-m-d H:i:s'),
	        	'update_ad'	=> date('Y-m-d H:i:s')
	        ],
        ]; 
        // Using Query Builder
        $groupsq = $this->db->table('estadocivil');
        $groupsq->insertBatch($estado);
    }
}
