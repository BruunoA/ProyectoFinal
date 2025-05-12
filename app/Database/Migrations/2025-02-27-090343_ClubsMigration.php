<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClubsMigration extends Migration
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
            // 'foto_club'        => [
            //     'type'           => 'TEXT',
            //     'null'           => false,
            // ],
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
        $this->forge->createTable('clubs');
    }

    public function down()
    {
        $this->forge->dropTable('clubs');
    }
}
