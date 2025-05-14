<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom' => 'Joan Garcia',
                'id_carrec' => 4,
                'descripcio' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'img' => 'http://localhost/fileget/entrenador.jpeg',
                'estat' => 1,
            ],
            [
                'nom' => 'Maria Lopez',
                'id_carrec' => 5,
                'descripcio' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'img' => 'http://localhost/fileget/entrenador.jpeg',
                'estat' => 1,
            ],
            [
                'nom' => 'Pere Martinez',
                'id_carrec' => 3,
                'descripcio' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'img' => 'http://localhost/fileget/entrenador.jpeg',
                'estat' => 1,
            ],
        ];

        $this->db->table('staff')->insertBatch($data);
    }
}
