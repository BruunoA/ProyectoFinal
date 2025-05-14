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
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('carrecs');
    }

    public function down()
    {
        $this->forge->dropTable('carrecs');
    }
}
