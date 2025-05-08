<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GestioMigration extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'auto_increment' => true,
                                'null'           => false,
                        ],
                        'nom'          => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '250',
                        ],
                        'id_club'          => [
                                'type'           => 'INT',
                                'null'           => false,
                        ],
                        'resum'          => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '250',
                        ],
                        'destacat'         => [
                                'type'           => 'TINYINT',
                                'constraint'     => 1,
                                'default'        => 0,
                        ],
                        'contingut' => [
                                'type'           => 'TEXT',
                                'null'           => false,
                        ],
                        'seccio'          => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'portada'          => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '250',
                        ],
                        'url'          => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '150',
                        ],
                        'estat'         =>  [
                                'type'           => 'TINYINT',
                                'constraint'     => 1,
                                'default'        => 0,
                        ],
                        'created_at'      =>  [
                                'type'         =>  'DATETIME',
                                'null'         =>  true,
                                'default'    =>  null,
                        ],
                        'updated_at'     =>  [
                                'type'         =>  'DATETIME',
                                'null'         =>  true,
                                'default'    =>  null,
                        ],
                        'deleted_at'          => [
                                'type'           => 'TIMESTAMP',
                                'null'           => true,
                                'default'        => null,
                        ],
                ]);
                $this->forge->addPrimaryKey('id');
                $this->forge->addForeignKey('id_club', 'clubs', 'id');
                $this->forge->createTable('gestio');
        }

        public function down()
        {
                $this->forge->dropTable('gestio');
        }
}
