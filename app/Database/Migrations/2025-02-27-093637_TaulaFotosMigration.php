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
                'unsigned'       => true,
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
            'id_album'          => [
                'type'           => 'INT',
                'null'           => false,
            ],
            'id_tag'          => [
                'type'           => 'INT',
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
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('taula_fotos');
        $this->forge->addForeignKey('descripcio', 'equips', 'id');
        $this->forge->addForeignKey('id_album', 'albums', 'id');
        $this->forge->addForeignKey('id_tag', 'tags', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('taula_fotos');
    }
}
