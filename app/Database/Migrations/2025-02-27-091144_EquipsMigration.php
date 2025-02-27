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
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'id_classificacio'          => [
                'type'           => 'INT',
                'null'           => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('equips');
        $this->forge->addForeignKey('id_classificacio', 'classificacio', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('equips');
    }
}
