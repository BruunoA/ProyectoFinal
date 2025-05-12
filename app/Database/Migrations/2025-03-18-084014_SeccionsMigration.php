<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeccionsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'nom'         => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            // 'estat'       => [
            //     'type'       => 'TINYINT',
            //     'constraint' => 1,
            //     'default'    => 0,
            // ],
            'created_at'  => [
                'type'      => 'DATETIME',
                'null'      => true,
            ],
            'updated_at'  => [
                'type'      => 'DATETIME',
                'null'      => true,
            ],
            'deleted_at'  => [
                'type'      => 'DATETIME',
                'null'      => true,
            ],
        ]);
        $this->forge->addKey('id');
        $this->forge->createTable('seccions');
    }

    public function down()
    {
        $this->forge->dropTable('seccions');
    }
}
