<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AlbumSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");

        for ($i = 0; $i < 3; $i++) {
            $data = [
                'titol' => $fake->sentence(4),
                'portada' => 'http://localhost/fileget/noticia.jpeg',
                'estat' => 'publicat',
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('albums')->insert($data);
        }
    }
}
