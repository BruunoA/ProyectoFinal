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
            $titol = $fake->sentence(4);
            $slug = url_title($titol, '-', true);

            $data = [
            'titol' => $titol,
            'slug' => $slug,
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
                'slug' => 'tags',
                'id_club' => random_int(1, 3),
                'portada' => 'http://localhost/fileget/alpicatLogo.png',
                'estat' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titol' => 'Noticies',
                'slug' => 'noticies',
                'id_club' => random_int(1, 3),
                'portada' => 'http://localhost/fileget/noticia.jpeg',
                'estat' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titol' => 'Programes',
                'slug' => 'programes',
                'id_club' => random_int(1, 3),
                'portada' => 'http://localhost/fileget/album.jpg',
                'estat' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titol' => 'Banner',
                'slug' => 'banner',
                'id_club' => random_int(1, 3),
                'portada' => 'http://localhost/fileget/album.jpg',
                'estat' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titol' => 'Staff',
                'slug' => 'staff',
                'id_club' => random_int(1, 3),
                'portada' => 'http://localhost/fileget/entrenador.jpg',
                'estat' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('albums')->insertBatch($data);
    }
}
