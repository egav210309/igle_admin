<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Areasdeservicioporpersona extends Migration
{
	public function up()
    {
            $this->forge->addField([
                    'id'          => [
                            'type'           => 'INT',
                            'constraint'     => 12,
                            'unsigned'       => true,
                            'auto_increment' => true,
                            'null'           => false,
                    ],
                    'id_area'       => [
                            'type'       => 'INT',
                            'constraint' =>  12,
                            'null'           => false,

                    ],
                    'user_id'       => [
                            'type'       => 'INT',
                            'constraint' =>  12,
                            'null'           => false,

                    ],
                    'create_at' => [
                            'type' => 'DATETIME',
                            'null' => false,
                    ],
                    'update_at' => [
                            'type' => 'DATETIME',
                            'null' => true,
                    ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('id_area', 'areasdeservicio', 'id_area', 'CASCADE', 'SET NULL');
            $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'SET NULL'); 
            $this->forge->createTable('areasdeservicioporuser');

    }

    public function down()
    {
            $this->forge->dropTable('areasdeservicioporuser');
    }
}
