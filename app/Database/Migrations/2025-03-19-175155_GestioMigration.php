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
                    'resum'          => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '250',
                    ],
                    'contingut'          => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '400',  // TODO: canviar a text
                    ],
                    'seccio'          => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '100',
                    ],
                    'url'          => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '150',
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
            $this->forge->createTable('gestio');
    }
    
    public function down()
    {
            $this->forge->dropTable('gestio');
    }
}
