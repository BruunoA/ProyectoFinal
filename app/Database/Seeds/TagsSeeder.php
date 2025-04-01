<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TagsSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");

        for ($i = 0; $i < 5; $i++) { 
            $data[] = [
                'nom_tag'    => $fake->word(), 
                'created_at' => date('Y-m-d H:i:s'), 
            ];
        }

        $this->db->table('tags')->insertBatch($data);
    }
}
