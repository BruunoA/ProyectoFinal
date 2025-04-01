<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class FotosSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES"); 

        $data = [
            'titol'      => $fake->sentence(4), 
            'descripcio' => $fake->text(100),
            'id_tag'     => rand(1, 5), 
            'created_at' => date('Y-m-d H:i:s'), 
        ];

        $this->db->table('taula_fotos')->insert($data);
    }
}
