<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CarrecsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom' => 'President',
            ],
            [
                'nom' => 'Vicepresident',
            ],
            [
                'nom' => 'Secretari',
            ],
            [
                'nom' => 'Entrenador',
            ],
            [
                'nom' => 'Fissioterapeuta',
            ],
        ];

        $this->db->table('carrecs')->insertBatch($data);
    }
}
