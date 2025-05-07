<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class zEventsSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");
        

        for ($i = 0; $i < 5; $i++) {
            $data = [
            'nom' => $nom = $fake->words(3, true),
            'descripcio' => $fake->text(200),
            // 'id_tipus_event' => rand(1, 3),
            'data' => $fake->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'estat' => $fake->randomElement(['publicat', 'no_publicat']),
            'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->table('events')->insert($data);
        }
    }
}
