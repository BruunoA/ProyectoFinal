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
                'auto_increment' => true,
            ],
            'nom'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
            'id_carrec'          => [
                'type'           => 'INT',
                'null'           => false,
            ],
            'img'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 300, 
                'null'           => false,
            ],
            'descripcio'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 400,
                'null'           => false,
            ],
            'estat'          => [
                'type'           => 'TINYINT',
                'constraint'     => 1,
                'default'        => 0,
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
        $this->forge->addForeignKey('id_carrec', 'carrecs', 'id');
        $this->forge->createTable('staff');
    }

    public function down()
    {
        $this->forge->dropTable('staff');
    }
}
