<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UbicacioSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");

        $nom = "Ubicacio";
        $ubicacio = "Camí del Graó, 25110, 25110 Alpicat, Lleida";
    
        $data = [
            'nom' => $nom,
            'valor' => $ubicacio,
            'tipus' => 'dades_contacte',
            'created_at' => date('Y-m-d H:i:s'),
        ];
    
    $this->db->table('configuracio')->insert($data);
    }
}
