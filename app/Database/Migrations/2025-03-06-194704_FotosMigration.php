<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TaulaFotosMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'titol'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'ruta'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'estat'          => [
                'type'           => 'TINYINT',
                'constraint'     => 1,
                'default'        => 1,
            ],
            // 'banner'          => [
            //     'type'           => 'ENUM',
            //     'constraint'     => ['si', 'no'],
            // ],
            'descripcio'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false,
            ],
            'id_album'          => [
                'type'           => 'INT',
                'null'           => true,  
            ],
            'created_at'      =>  [
                'type'         =>  'DATETIME',
                'null'         =>  true,
                'default'    =>  null,
            ],
            'updated_at'      =>  [
                'type'         =>  'DATETIME',
                'null'         =>  true,
                'default'    =>  null,
            ],
            // 'publicated_at'          => [
            //     'type'           => 'TIMESTAMP',
            //     'null'           => true,
            //     'default'        => null,
            // ],
            'deleted_at'          => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
                'default'        => null,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_album', 'albums', 'id');
        $this->forge->createTable('taula_fotos');
    }

    public function down()
    {
        $this->forge->dropTable('taula_fotos');
    }
}
