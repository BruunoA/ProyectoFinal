<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class zFotosSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");

        for ($i = 0; $i < 20; $i++) {
            $data = [
                'titol' => $fake->sentence(4),
                'descripcio' => $fake->text(100),
                'id_tag' => rand(1, 5),     // TODO: TREURE?    
                'id_album' => rand(1, 3),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('taula_fotos')->insert($data);
        }
    }
}
