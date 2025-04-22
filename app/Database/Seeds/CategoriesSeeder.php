<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('es_ES');
        $data = [];


        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'titol'          => $faker->words(3, true),
                'descripcio'     => $faker->sentence(10),
                'horari'         => $faker->paragraph(2),
            ];
        }

        $this->db->table('categories')->insertBatch($data);
    }
}
