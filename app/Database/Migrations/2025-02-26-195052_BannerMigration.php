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
            'titol'  => [
                'type'           => 'VARCHAR',
                'constraint'     => 255, 
            ],
            'img'   => [
                'type'           => 'text',
                'null'           => false,
            ],
            'tipus' => [
                'type'           => 'ENUM',
                'constraint'     => ['banner', 'logo'],
                'default'        => 'banner',
            ],
            'destacat' => [
                'type'           => 'TINYINT',
                'constraint'     => 1,
                'default'        => 0,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => false,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
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
