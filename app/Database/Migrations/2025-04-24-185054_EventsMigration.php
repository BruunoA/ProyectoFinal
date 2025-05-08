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
                'auto_increment' => true,
            ],
            'nom'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'descripcio'   => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'data'         => [ 
                'type'           => 'DATE',
                'null'           => false,
            ],
            // 'id_tipus_event'          => [
            //     'type'           => 'INT',
            //     'null'           => false,
            // ],
            // 'seccio'          => [
            //     'type'           => 'VARCHAR',
            //     'constraint'     => '250',
            //     'default'        => 'event',
            // ],
            'estat'          => [
                'type'           => 'ENUM',
                'constraint'     => ['publicat', 'no_publicat'],
                'default'        => 'no_publicat',
            ],
            'id_club'          => [
                'type'           => 'INT',
                'null'           => false,
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
        ]);
        $this->forge->addPrimaryKey('id');
        // $this->forge->addForeignKey('id_tipus_event', 'tipus_events', 'id');
        $this->forge->addForeignKey('id_club', 'clubs', 'id');
        $this->forge->createTable('events');
    }

    public function down()
    {
        $this->forge->dropTable('events');
    }
}
