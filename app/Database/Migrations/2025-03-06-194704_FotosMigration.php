<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TaulaFotosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'titol'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'descripcio'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'img'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'deleted_at'          => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
                'default'        => null,
            ],
            'publicated_at'          => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
                'default'        => null,
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
            'id_album'          => [
                'type'           => 'INT',
                'null'           => true,     
            ],
            'id_tag'          => [
                'type'           => 'INT',
            ],

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_album', 'albums', 'id');
        $this->forge->addForeignKey('id_tag', 'tags', 'id');
        $this->forge->createTable('taula_fotos');
    }

    public function down()
    {
        $this->forge->dropTable('taula_fotos');
    }
}
