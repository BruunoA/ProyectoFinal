<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EquipsMigration extends Migration
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
            // 'id_classificacio'          => [
            //     'type'           => 'INT',
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
        // $this->forge->addForeignKey('id_classificacio', 'classificacio', 'id');
        $this->forge->createTable('equips');
    }

    public function down()
    {
        $this->forge->dropTable('equips');
    }
}


