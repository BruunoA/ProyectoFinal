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
                'unsigned'       => true,
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
                'type'           => 'INT',
                'null'           => false,
            ],
            'ordre'          => [
                'type'           => 'INT',
            ],
            'id_tag'          => [
                'type'           => 'INT',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('menu');
        $this->forge->addForeignKey('id_tag', 'tag', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('menu');
    }
}
