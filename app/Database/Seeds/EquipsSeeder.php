<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class EquipsSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('es_ES');

        $data = [];

        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'nom' => $faker->company, 
            ];
        }

        $this->db->table('equips')->insertBatch($data);
    }
}
