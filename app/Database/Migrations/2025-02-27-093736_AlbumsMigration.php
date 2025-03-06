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
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('albums');
    }

    public function down()
    {
        $this->forge->dropTable('albums');
    }
}
