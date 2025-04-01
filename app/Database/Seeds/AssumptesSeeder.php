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
            'missatge' => 'lorem diwjpqwidqwpd`qwp`kqwpow',
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [
            'nom' => 'Partits',
            'missatge' => 'lorem diwjpqwidqwpd`qwp`kqwpow',
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [
            'nom' => 'Competicions',
            'missatge' => 'lorem diwjpqwidqwpd`qwp`kqwpow',
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [
            'nom' => 'Altres',
            'missatge' => 'lorem diwjpqwidqwpd`qwp`kqwpow',
            'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('assumptes')->insertBatch($data);
    }
}
