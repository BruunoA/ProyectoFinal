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
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'enllaç'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'id_album'          => [
                'type'           => 'INT',
                'null'           => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('taula_videos');
        $this->forge->addForeignKey('id_album', 'albums', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('taula_videos');
    }
}
