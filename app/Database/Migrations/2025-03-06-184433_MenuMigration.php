<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenuMigration extends Migration
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
                'constraint'     => 255, 
                'null'           => false,
            ],
            'enllaç'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'id_pare'          => [
                'type'           => 'INT',
            ],
            'visibilitat'          => [
                'type'           => 'TINYINT',
                'visible'        => 'TINYINT',
                'default'        => true,       // TODO: ACABAR DE VEURE COM SERIA
            ],
            'ordre'          => [
                'type'           => 'INT',
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
            ],
            'deleted_at'          => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
                'default'        => null,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_tag', 'tags', 'id');
        $this->forge->createTable('menu');
    }

    public function down()
    {
        $this->forge->dropTable('menu');
    }
}
