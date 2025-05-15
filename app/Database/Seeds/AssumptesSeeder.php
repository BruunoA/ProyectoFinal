<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AssumptesSeeder extends Seeder
{
    public function run()
    {
        $data =[
            [
            'nom' => 'Entrenaments',
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [
            'nom' => 'Partits',
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [
            'nom' => 'Competicions',
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [
            'nom' => 'Altres',
            'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('assumptes')->insertBatch($data);
    }
}
