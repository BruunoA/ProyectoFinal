<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        // $this->db->disableForeignKeyChecks(); // Desactiva las restricciones FK
        
        $faker = Factory::create('es_ES');
        $data = [];
        
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'titol' => $faker->words(3, true),
                'descripcio' => $faker->sentence(10),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => $faker->paragraph(2),
                'id_equip' => random_int(1, 6),
                'created_at' => date('Y-m-d H:i:s')
            ];
        }
        
        $this->db->table('categories')->insertBatch($data);
        
        // $this->db->enableForeignKeyChecks(); // Reactiva las restricciones FK
    }
}
