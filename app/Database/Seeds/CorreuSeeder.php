<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CorreuSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");

        $nom = "Correu";
        $correu_electronic = $fake->companyEmail();
    
        $data = [
            'nom' => $nom,
            'valor' => $correu_electronic,
            'tipus' => 'dades_contacte',
            'created_at' => date('Y-m-d H:i:s'),
        ];
    
    $this->db->table('configuracio')->insert($data);
    }
}
