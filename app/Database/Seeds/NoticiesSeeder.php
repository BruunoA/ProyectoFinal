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
            $url = url_title($nom, '-', true);

            $data = [
                'nom' => $nom,
                'id_club' => random_int(1, 3),
                'resum' => $resum,
                'contingut' => $contingut,
                'destacat' => $fake->numberBetween(0, 1),
                'id_seccio' => 1,
                'portada' => 'http://localhost/fileget/noticia.jpeg',
                'url' => $url,
                'estat' => $fake->numberBetween(0, 1),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('gestio')->insert($data);
        }
    }
}
