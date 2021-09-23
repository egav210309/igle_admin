<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Estadocivil extends Migration
{
  public function up()
    {
            $this->forge->addField([
                    'id_estado'          => [
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
            $this->forge->addKey('id_estado', true);
            $this->forge->createTable('estadocivil');
    }

    public function down()
    {
            $this->forge->dropTable('estadocivil');
    }
}
