<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class VisioSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");
        $nom = $fake->words(3, true);

            $data = [
                'nom' => $nom,
                'id_club' => random_int(1, 3),
                'contingut' => $fake->paragraph(3),
                'resum' => $fake->paragraph(20),
                'seccio' => 'visio',
                'url' => url_title($nom, '-', true),
                'estat' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->table('gestio')->insert($data);
    }
}
