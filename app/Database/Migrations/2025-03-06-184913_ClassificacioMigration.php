<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClassificacioMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'posicio'          => [
                'type'           => 'INT',
            ],
            'nom'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'punts'          => [
                'type'           => 'INT',
            ],
            'pj'          => [
                'type'           => 'INT',
            ],
            'pg'          => [
                'type'           => 'INT',
            ],
            'pe'          => [
                'type'           => 'INT',
            ],
            'pp'          => [
                'type'           => 'INT',
            ],
            'gf'          => [
                'type'           => 'INT',
            ],
            'gc'          => [
                'type'           => 'INT',
            ],
            'resultats'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
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
            'deleted_at'     =>  [
                'type'         =>  'DATETIME',
                'null'         =>  true,
                'default'    =>  null,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('classificacio');
    }

    public function down()
    {
        $this->forge->dropTable('classificacio');
    }
}
