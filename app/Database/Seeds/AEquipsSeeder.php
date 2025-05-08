<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AEquipsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom' => 'juvenil-segona-divisio',
            ],
            [
                'nom' => 'cadet-primera-divisio',
            ],
            [
                'nom' => 'tercera-catalana',
            ],
            [
                'nom' => 'segona-catalana',
            ],
            [
                'nom' => 'cadet-segona-divisio',
            ],
            [
                'nom' => 'infantil-segona-divisio-s14',
            ],
            [
                'nom' => 'primera-divisio-alevi-s11',
            ],
            [
                'nom' => 'segona-divisio-alevi-s12',
            ],
            [
                'nom' => 'segona-divisio-alevi-s11',
            ],
            [
                'nom' => 'preferent-alevi-s12',
            ],
            [
                'nom' => 'primera-divisio-benjamins-s10',
            ],
            [
                'nom' => 'primera-divisio-benjamins-s9',
            ],
            [
                'nom' => 'prebenjamins-s8',
            ],
            [
                'nom' => 'prebenjamins-s7',
            ],
            [
                'nom' => 'segona-divisio-femeni-juvenil',
            ],
            [
                'nom' => 'segona-divisio-femeni-infantil',
            ],
            [
                'nom' => 'segona-divisio-femeni-alevi',
            ],
        ];

        $this->db->table('equips')->insertBatch($data);
    }
}
