<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estadousuario extends Migration
{
      public function up()
    {
            $this->forge->addField([
                    'cod_estado'          => [
                            'type'           => 'INT',
                            'constraint'     => 11,
                            'unsigned'       => true,
                            'auto_increment' => true,
                            'null'           => false,
                    ],
                    'name_estado'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => '30',
                            'null'           => false,

                    ],
                    'created_at' => [
                            'type' => 'DATETIME',
                            'null' => false,
                    ],
                    'updated_at' => [
                            'type' => 'DATETIME',
                            'null' => true,
                    ],
                    'deleted_at' => [
                            'type' => 'DATETIME',
                            'null' => true,
                    ],
            ]);
            $this->forge->addKey('cod_estado', true);
            $this->forge->createTable('estadousuario');
    }

    public function down()
    {
            $this->forge->dropTable('estadousuario');
    }
}
