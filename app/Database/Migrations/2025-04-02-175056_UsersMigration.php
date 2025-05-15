<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersMigration extends Migration
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
                'constraint'     => '150',
                'null'           => false,
            ],
            'rol'         => [
                'type'           => 'ENUM',
                'constraint'     => ['admin', 'superadmin'],
                'default'        => 'admin',
            ],
            'password'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '300',
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
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
