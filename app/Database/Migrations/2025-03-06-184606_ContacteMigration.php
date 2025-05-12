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
                'auto_increment' => true,
            ],
            'nom'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'text'          => [
                'type'           => 'TEXT',
                'null'           => false,
            ],
            'from_email'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'telefon'          => [
                'type'           => 'INT',
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
            'data_resposta'          => [
                'type'           => 'TIMESTAMP',
                'null'           => false,
            ],
            'id_assumpte'          => [
                'type'           => 'INT',
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
            'deleted_at'          => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
                'default'        => null,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('contacte');
        $this->forge->addForeignKey('id_assumpte', 'assumptes', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('contacte');
    }
}
