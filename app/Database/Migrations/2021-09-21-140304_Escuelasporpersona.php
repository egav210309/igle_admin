<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Escuelasporpersona extends Migration
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
                    'id_escuela'       => [
                            'type'       => 'INT',
                            'constraint' =>  5,
                            'unsigned'       => true,
                            'null'           => false,

                    ],
                    'user_id'       => [
                            'type'       => 'INT',
                            'constraint' =>  5,
                            'unsigned'       => true,
                            'null'           => false,

                    ],
                    'create_at' => [
                            'type' => 'DATETIME',
                            'null' => false,
                    ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('id_escuela', 'escueladelavision', 'id_escuela', 'CASCADE', 'SET NULL');
            $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'SET NULL'); 
            $this->forge->createTable('esculadelavisionporuser');

    }

    public function down()
    {
            $this->forge->dropTable('esculadelavisionporuser');
    }
}
