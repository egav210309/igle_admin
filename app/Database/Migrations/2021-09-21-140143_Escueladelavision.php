<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Escueladelavision extends Migration
{
   public function up()
    {
            $this->forge->addField([
                    'id_escuela'          => [
                            'type'           => 'INT',
                            'constraint'     => 5,
                            'unsigned'       => true,
                            'auto_increment' => true,
                            'null'           => false,
                    ],
                    'nombre_escuela'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '100',

                    ],
                    'direccion_cdp'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '255',

                    ],
                    'dia_que_realiza'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '50',

                    ],
                    'hora'       => [
                            'type'       => 'TIME',
                            'null' 		 => false,

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
            $this->forge->addKey('id_escuela', true);
            $this->forge->createTable('escueladelavision');
    }

    public function down()
    {
            $this->forge->dropTable('escueladelavision');
    }
}
