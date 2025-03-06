<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TaulaVideosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'enllaç'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'id_album'          => [
                'type'           => 'INT',
                'null'           => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_album', 'albums', 'id');
        $this->forge->createTable('taula_videos');
    }

    public function down()
    {
        $this->forge->dropTable('taula_videos');
    }
}
