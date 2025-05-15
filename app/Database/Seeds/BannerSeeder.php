<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class BannerSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 0; $i < 1; $i++) {
            $nom = $fake->sentence(6);

            $data = [
                'titol' => $nom,
                'img' => 'http://localhost/fileget/campoAlpicat.jpg',
                'tipus' => 'banner',
                'destacat' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('banner')->insert($data);
        }

        $data = [
            'titol' => 'Logo',
            'img' => 'http://localhost/fileget/alpicatLogo.png',
            'tipus' => 'logo',
            'destacat' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('banner')->insert($data);
    }
}
