<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Redes extends Migration
{
    public function up()
    {
            $this->forge->addField([
                    'id_redes'          => [
                            'type'           => 'INT',
                            'constraint'     => 5,
                            'unsigned'       => true,
                            'auto_increment' => true,
                            'null'           => false,
                    ],
                    'nombre_red'       => [
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
            $this->forge->addKey('id_redes', true);
            $this->forge->createTable('redes');
    }

    public function down()
    {
            $this->forge->dropTable('redes');
    }
}
