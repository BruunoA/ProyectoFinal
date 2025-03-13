<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenuTagsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_menu'          => [
                'type'           => 'INT',
            ],
            'id_tags'          => [
                'type'           => 'INT',
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
        $this->forge->addPrimaryKey('id_menu', 'id_tags');
        $this->forge->addForeignKey('id_menu', 'menu', 'id');
        $this->forge->addForeignKey('id_tags', 'tags', 'id');
        $this->forge->createTable('menu_tags');
    }

    public function down()
    {
        $this->forge->dropTable('menu_tags');
    }
}
