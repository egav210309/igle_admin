<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TUsuarios extends Migration
{
     public function up()
        {
                $this->forge->addField([
                        'user_id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'usuario'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '100',
                        ],
                        'password'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '100',
                        ],
                        'type' => [
                                'type'          => 'INT',
                                'constraint'     => 11,
                        ],
                ]);
                $this->forge->addKey('user_id', true);
                $this->forge->createTable('users');
        }

        public function down()
        {
                $this->forge->dropTable('blog');
        }
}
