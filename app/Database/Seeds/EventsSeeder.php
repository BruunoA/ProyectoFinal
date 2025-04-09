<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class EventsSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");
        

        for ($i = 0; $i < 5; $i++) {
            $data = [
            'nom' => $nom = $fake->words(3, true),
            'tipus_event' => $fake->randomElement(['partit', 'entrenament', 'sortides']),
            'data' => $fake->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->table('events')->insert($data);
        }
    }
}
