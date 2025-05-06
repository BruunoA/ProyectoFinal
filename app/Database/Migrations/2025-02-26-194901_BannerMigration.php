<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BannerMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'text'          => [
                'type'           => 'VARCHAR',
                'null'           => false,
            ],
            'boto'          => [
                'type'           => 'VARCHAR',
                'null'           => false,
            ],
            'img'          => [
                'type'           => 'VARCHAR',
                'null'           => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('banner');
    }

    public function down()
    {
        $this->forge->dropTable('banner');
    }
}
