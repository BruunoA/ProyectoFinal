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
            'logo'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
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
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('nom', 'albums', 'id');
        $this->forge->createTable('classificacio');
    }

    public function down()
    {
        $this->forge->dropTable('classificacio');
    }
}
