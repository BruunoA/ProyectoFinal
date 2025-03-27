<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ConfiguracioMigration extends Migration
{
    public function up()
    {
            $this->forge->addField([
                    'id'          => [
                            'type'           => 'INT',
                            'auto_increment' => true,
                    ],
                    'nom'          => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '250',
                    ],
                    'valor'          => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '250',
                    ],
                    'tag'          => [
                            'type'           => 'INT',
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
            $this->forge->createTable('configuracio');
    }
    
    public function down()
    {
            $this->forge->dropTable('configuracio');
    }
}
