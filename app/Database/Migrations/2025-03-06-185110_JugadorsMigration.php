<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JugadorsMigration extends Migration
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
            'cognoms'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'dorsal'          => [
                'type'           => 'INT',
                'null'           => false,
            ],
            'posicio'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'id_equip'          => [
                'type'           => 'INT',
                'null'           => true,       // TODO: Canviar a false
            ],
            'created_at'          => [
                'type'           => 'DATETIME',
                'null'           => false,
            ],
            'deleted_at'          => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at'          => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_equip', 'equips', 'id');
        $this->forge->createTable('jugadors');
    }

    public function down()
    {
        $this->forge->dropTable('jugadors');
    }
}
