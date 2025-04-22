<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TelefonSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");

        $nom = "Telefon";
        $telefon = $fake->phoneNumber();
    
        $data = [
            'nom' => $nom,
            'valor' => $telefon,
            'tipus' => 'dades_conacte',
            'created_at' => date('Y-m-d H:i:s'),
        ];
    
    $this->db->table('configuracio')->insert($data);
    }
}
