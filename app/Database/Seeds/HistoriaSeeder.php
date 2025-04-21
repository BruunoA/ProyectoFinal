<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class HistoriaSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");

            $nom = $fake->sentence(3);

            $data = [
                'nom' => $nom,
                'resum' => $fake->text(100),
                'contingut' => $fake->paragraphs(20, true), 
                'seccio' => 'historia',
                'estat' => 'publicat',
                'created_at' => date('Y-m-d H:i:s'), 
            ];

            $this->db->table('gestio')->insert($data);
    }
}
