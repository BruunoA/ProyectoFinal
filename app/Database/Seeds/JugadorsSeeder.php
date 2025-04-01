<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class JugadorsSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 0; $i < 4; $i++) {
            $nom = $fake->firstName();
            $cognoms = $fake->lastName();
            $dorsal = $fake->numberBetween(1, 99);
            $posicio = $fake->randomElement(['Porter', 'Defensa', 'Migcampista', 'Davanter']);
            $data = [
                'nom' => $nom,
                'cognoms' => $cognoms,
                'dorsal' => $dorsal,
                'posicio' => $posicio,
                // 'id_equip' => $i + 1,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->table('jugadors')->insert($data);
        }
    }
}
