<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ContacteMigration extends Migration
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
            'assumpte'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'text'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'from_email'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'to'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'resposta'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'data'          => [
                'type'           => 'TIMESTAMP',
                'null'           => false,
            ],
            'id_tag'          => [
                'type'           => 'INT',
            ],
            'id_assumpte'          => [
                'type'           => 'INT',
                'null'           => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('contacte');
        $this->forge->addForeignKey('id_tag', 'tag', 'id');
        $this->forge->addForeignKey('id_assumpte', 'assumptes', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('contacte');
    }
}
