<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class NoticiesSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 0; $i < 6; $i++) { 
            $nom = $fake->sentence(6); 
            $resum = $fake->text(100); 
            $contingut = $fake->paragraphs(20, true); 
            $seccio = "noticies";
            $url = url_title($nom, '-', true);

            $data = [
                'nom' => $nom,
                'resum' => $resum,
                'contingut' => $contingut,
                'seccio' => $seccio,
                'portada' => 'http://localhost/fileget/noticia.jpeg',
                'url' => $url,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('gestio')->insert($data);
        }
    }
}
