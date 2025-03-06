<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BannerMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'text'  => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
            ],
            'boto'  => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,   
            ],
            'img'   => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
                'null'           => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('banner');
    }

    public function down()
    {
        $this->forge->dropTable('banner');
    }
}
