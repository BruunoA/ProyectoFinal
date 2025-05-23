<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlbumsMigration extends Migration
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
            'id_club'          => [
                'type'           => 'INT',
                'null'           => false,
            ],
            'portada'          => [
                'type'           => 'text',
                'null'           => false,
            ],
            'estat'          => [
                'type'           => 'TINYINT',
                'constraint'     => 1,
                'null'           => false,
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
        $this->forge->addForeignKey('id_club', 'clubs', 'id');
        $this->forge->createTable('albums');
    }

    public function down()
    {
        $this->forge->dropTable('albums');
    }
}
