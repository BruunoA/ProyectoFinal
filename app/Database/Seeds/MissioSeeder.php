<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class MissioSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");
        $nom = $fake->words(3, true);
            $data = [
                'nom' => $nom,
                'contingut' => $fake->paragraph(20),
                'seccio' => 'missio',
                'url' => url_title($nom, '-', true),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->table('gestio')->insert($data);
    }
}
