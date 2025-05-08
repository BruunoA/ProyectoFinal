<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class NoticiesSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 0; $i < 20; $i++) { 
            $nom = $fake->sentence(6); 
            $resum = $fake->text(100); 
            $contingut = $fake->paragraphs(20, true); 
            $seccio = "noticies";
            $url = url_title($nom, '-', true);

            $data = [
                'nom' => $nom,
                'id_club' => random_int(1, 3),
                'resum' => $resum,
                'contingut' => $contingut,
                'destacat' => $fake->randomElement(['si', 'no']),
                'seccio' => $seccio,
                'portada' => 'http://localhost/fileget/noticia.jpeg',
                'url' => $url,
                'estat' => $fake->randomElement(['publicat', 'no_publicat']),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('gestio')->insert($data);
        }

        for ($i = 0; $i < 3; $i++) { 
            $nom = $fake->sentence(6); 
            // $resum = $fake->text(100); 
            // $contingut = $fake->paragraphs(20, true); 
            $seccio = "banner";
            $url = url_title($nom, '-', true);

            $data = [
                'nom' => $nom,
                'id_club' => random_int(1, 3),
                // 'resum' => $resum,
                'contingut' => 'http://localhost/fileget/campoAlpicat.jpg',
                'destacat' => 'no',
                'seccio' => $seccio,
                'portada' => 'http://localhost/fileget/noticia.jpeg',
                'url' => $url,
                'estat' => 'publicat',
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('gestio')->insert($data);
        }
    }
}
