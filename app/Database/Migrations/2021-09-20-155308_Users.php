<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
         public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'usuario'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'password'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'type'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'first_name'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'last_name'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'username'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '30',
                        ],
                        'create_at' => [
                            'type' => 'DATETIME',
                            'null' => false,
                        ],
                        'updated_at' => [
                                'type' => 'DATETIME',
                                'null' => false,
                        ],
                        'deleted_at' => [
                                'type' => 'DATETIME',
                                'null' => false,
                        ],
                ]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('users');
        }

        public function down()
        {
                $this->forge->dropTable('users');
        }
}
