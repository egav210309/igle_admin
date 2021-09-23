<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Areasdeservicio extends Migration
{
   public function up()
    {
            $this->forge->addField([
                    'id_area'          => [
                            'type'           => 'INT',
                            'constraint'     => 5,
                            'unsigned'       => true,
                            'auto_increment' => true,
                            'null'           => false,
                    ],
                    'nombre_area'       => [
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
            $this->forge->addKey('id_area', true);
            $this->forge->createTable('areasdeservicio');
    }

    public function down()
    {
            $this->forge->dropTable('areasdeservicio');
    }
}
