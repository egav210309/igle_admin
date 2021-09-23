<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Gobiernos extends Seeder
{
    public function run()
    {
    	$faker = Factory::create();
    	$gobiernos = [];
    	$created_at = $faker->dateTime();
        //para gobiernos
        $gobiernos = [
        	[ 
	        	'nombre'	=> 'Remanentes',
	        	'create_at '	=> date('Y-m-d H:i:s'),
	        	'update_at'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'nombre'	=> 'Ministros',
	        	'create_at '	=>  date('Y-m-d H:i:s'),
	        	'update_at'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'nombre'	=> 'Ancianos',
	        	'create_at '	=>  date('Y-m-d H:i:s'),
	        	'update_at'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'nombre'	=> 'Mentores',
	        	'create_at '	=>  date('Y-m-d H:i:s'),
	        	'update_at'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'nombre'	=> 'Líderes',
	        	'create_at '	=>  date('Y-m-d H:i:s'),
	        	'update_at'	=> date('Y-m-d H:i:s')
	        ],
        	[ 
	        	'nombre'	=> 'Pueblo',
	        	'create_at '	=>  date('Y-m-d H:i:s'),
	        	'update_at'	=> date('Y-m-d H:i:s')
	        ],
        ];
        // Using Query Builder
        $gobiernosq = $this->db->table('gobierno');
        $gobiernosq->insertBatch($gobiernos);
    }
}
