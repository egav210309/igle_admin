<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gobierno extends Migration
{
    public function up()
    {
            $this->forge->addField([
                    'id_gobierno'          => [
                            'type'           => 'INT',
                            'constraint'     => 5,
                            'unsigned'       => true,
                            'auto_increment' => true,
                            'null'			 => false,
                    ],
                    'nombre'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '100',
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
            $this->forge->addKey('id_gobierno', true);
            $this->forge->createTable('gobierno');
    }

    public function down()
    {
            $this->forge->dropTable('gobierno');
    }
}
