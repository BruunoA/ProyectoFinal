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
                'ruta' => 'assets/img/camara.png',
                // 'banner' => 'no',  
                'id_album' => rand(1, 13),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->table('taula_fotos')->insert($data);
        }
        
        // for ($i = 0; $i < 3; $i++) {
        //     $data = [
        //         'titol' => $fake->sentence(4),
        //         'descripcio' => $fake->text(100),
        //         'ruta' => 'http://localhost/fileget/campoAlpicat.jpg',
        //         'banner' => 'si',
        //         // 'id_tag' => rand(1, 3),     
        //         'id_album' => rand(1, 13),
        //         'created_at' => date('Y-m-d H:i:s'),
        //     ];

        //     $this->db->table('taula_fotos')->insert($data);
        // }

    }
}
