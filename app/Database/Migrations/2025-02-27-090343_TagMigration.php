<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TagMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom_tag'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tag');
    }

    public function down()
    {
        $this->forge->dropTable('tag');
    }
}
