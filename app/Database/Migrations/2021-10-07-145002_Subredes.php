<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subredes extends Migration
{
      public function up()
    {
            $this->forge->addField([
                    'id_subred'          => [
                            'type'           => 'INT',
                            'constraint'     => 11,
                            'unsigned'       => true,
                            'auto_increment' => true,
                            'null'           => false,
                    ],
                    'subred'       => [
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
            $this->forge->addKey('id_subred', true);
            $this->forge->createTable('redes_sub');
    }

    public function down()
    {
            $this->forge->dropTable('id_subred');
    }
}
