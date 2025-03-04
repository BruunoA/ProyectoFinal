<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StaffMigration extends Migration
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
            'id_equip'          => [
                'type'           => 'INT',
                'null'           => false,
            ],
            'carrec'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('staff');
        $this->forge->addForeignKey('id_equip', 'equips', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('staff');
    }
}
