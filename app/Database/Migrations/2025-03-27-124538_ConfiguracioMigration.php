<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ConfiguracioMigration extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'id' => [
                                'type'           => 'INT',
                                'auto_increment' => true,
                        ],
                        'nom' => [
                                'type'       => 'VARCHAR',
                                'constraint' => '250',
                        ],
                        'icona' => [
                                'type'       => 'VARCHAR',
                                'constraint' => '250',
                                'null'       => true,
                        ],
                        'valor' => [
                                'type'       => 'TEXT',
                                'null'       => false,
                        ],
                        'tipus'          => [
                                'type'           => 'ENUM',
                                'constraint'     => ['dades_contacte', 'xarxes_socials', 'menu_general', 'menu_gestio', 'idiomes', 'idioma_defecte'],
                                'default'        => null,
                        ],
                        'id_pare' => [
                                'type' => 'INT',
                                'null' => true,
                                'default' => null,
                        ],
                        'visibilitat' => [
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'default' => 0,
                        ],
                        'ordre' => [
                                'type' => 'INT',
                                'null' => true,
                        ],
                        // 'id_tag' => [
                        //     'type' => 'INT',
                        //     'null' => true,
                        // ],
                        'created_at' => [
                                'type'    => 'DATETIME',
                                'null'    => true,
                                'default' => null,
                        ],
                        'updated_at' => [
                                'type'    => 'DATETIME',
                                'null'    => true,
                                'default' => null,
                        ],
                        'deleted_at' => [
                                'type'    => 'TIMESTAMP',
                                'null'    => true,
                                'default' => null,
                        ],
                ]);
                $this->forge->addPrimaryKey('id');
                // $this->forge->addForeignKey('id_pare', 'configuracio', 'id');
                $this->forge->createTable('configuracio');
        }

        public function down()
        {
                $this->forge->dropTable('configuracio');
        }
}
