<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AEquipsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom' => 'Juvenil A',
            ],
            [
                'nom' => 'Juvenil B',
            ],
            [
                'nom' => 'Cadet A',
            ],
            [
                'nom' => 'Cadet B',
            ],
            [
                'nom' => 'Infantil A',
            ],
            [
                'nom' => 'Infantil B',
            ],
        ];

        $this->db->table('equips')->insertBatch($data);
    }
}
