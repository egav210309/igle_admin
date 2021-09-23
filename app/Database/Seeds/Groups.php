<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Groups extends Seeder
{
    public function run()
    {
        //para grupos
        $group = [
        	[ 
	        	'name_group'	=> 'superadmin',
	        	'create_at'	=> date('Y-m-d H:i:s'),
	        	'update_ad'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'name_group'	=> 'admin',
	        	'create_at'	=> date('Y-m-d H:i:s'),
	        	'update_ad'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'name_group'	=> 'user',
	        	'create_at'	=> date('Y-m-d H:i:s'),
	        	'update_ad'	=> date('Y-m-d H:i:s')
	        ],
        ]; 
        // Using Query Builder
        $groupsq = $this->db->table('groups');
        $groupsq->insertBatch($group);
    }
}
