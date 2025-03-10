<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'tipus_event'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'publicated_at'          => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
                'default'        => null,
            ],
            'deleted_at'          => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
                'default'        => null,
            ],
            'id_tag'          => [
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
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('events');
        $this->forge->addForeignKey('tipus_event', 'equips', 'id');
        $this->forge->addForeignKey('id_tag', 'tags', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('events');
    }
}
