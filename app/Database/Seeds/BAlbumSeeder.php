<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class BAlbumSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");

        for ($i = 0; $i < 5; $i++) {
            $data = [
                'titol' => $fake->sentence(4),
                'id_club' => random_int(1, 3),
                'portada' => 'http://localhost/fileget/album.jpg',
                'estat' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('albums')->insert($data);
        }

        $data = [
            [
                'titol' => 'Tags',
                'id_club' => random_int(1, 3),
                'portada' => 'http://localhost/fileget/alpicatLogo.png',
                'estat' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titol' => 'Noticies',
                'id_club' => random_int(1, 3),
                'portada' => 'http://localhost/fileget/noticia.jpeg',
                'estat' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titol' => 'Programes',
                'id_club' => random_int(1, 3),
                'portada' => 'http://localhost/fileget/album.jpg',
                'estat' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titol' => 'Banner',
                'id_club' => random_int(1, 3),
                'portada' => 'http://localhost/fileget/album.jpg',
                'estat' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titol' => 'Staff',
                'id_club' => random_int(1, 3),
                'portada' => 'http://localhost/fileget/entrenador.jpg',
                'estat' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('albums')->insertBatch($data);
    }
}
