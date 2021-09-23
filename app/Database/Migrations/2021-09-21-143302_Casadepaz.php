<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Casadepaz extends Migration
{
   public function up()
    {
            $this->forge->addField([
                    'id_cdp'          => [
                            'type'           => 'INT',
                            'constraint'     => 5,
                            'unsigned'       => true,
                            'auto_increment' => true,
                            'null'           => false,
                    ],
                    'nombre_cdp'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '100',

                    ],
                    'direccion_cdp'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '255',

                    ],
                    'ubicacion'       => [
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
            $this->forge->addKey('id_cdp', true);
            $this->forge->createTable('casesdepaz');
    }

    public function down()
    {
            $this->forge->dropTable('casesdepaz');
    }
}
