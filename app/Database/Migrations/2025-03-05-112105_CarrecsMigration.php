<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CarrecsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'nom'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('carrecs');
    }

    public function down()
    {
        $this->forge->dropTable('carrecs');
    }
}
