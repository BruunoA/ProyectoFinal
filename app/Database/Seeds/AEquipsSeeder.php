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
                'grup' => 46,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-11/juvenil-segona-divisio/grup-46',
            ],
            [
                'nom' => 'cadet-primera-divisio',
                'grup' => 14,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-11/cadet-primera-divisio/grup-14',
            ],
            [
                'nom' => 'tercera-catalana',
                'grup' => 14,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-11/tercera-catalana/grup-14',
            ],
            [
                'nom' => 'segona-catalana',
                'grup' => 5,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-11/segona-catalana/grup-5',
            ],
            [
                'nom' => 'cadet-segona-divisio',
                'grup' => 55,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-11/cadet-segona-divisio/grup-55',
            ],
            [
                'nom' => 'infantil-segona-divisio-s14',
                'grup' => 28,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-11/infantil-segona-divisio-s14/grup-28',
            ],
            [
                'nom' => 'primera-divisio-alevi-s11',
                'grup' => 9,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-7/primera-divisio-alevi-s11/grup-9',
            ],
            [
                'nom' => 'segona-divisio-alevi-s12',
                'grup' => 22,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-7/segona-divisio-alevi-s12/grup-22',
            ],
            [
                'nom' => 'segona-divisio-alevi-s11',
                'grup' => 23,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-7/segona-divisio-alevi-s11/grup-23',
            ],
            [
                'nom' => 'preferent-alevi-s12',
                'grup' => 5,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-7/preferent-alevi-s12/grup-5',
            ],
            [
                'nom' => 'primera-divisio-benjamins-s10',
                'grup' => 13,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2324/futbol-7/primera-divisio-benjami-s10/grup-13',
            ],
            [
                'nom' => 'primera-divisio-benjamins-s9',
                'grup' => 11,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-7/primera-divisio-benjami-s9/grup-11',
            ],
            [
                'nom' => 'prebenjamins-s8',
                'grup' => 25,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-7/prebenjami-s8/grup-25',
            ],
            [
                'nom' => 'prebenjamins-s7',
                'grup' => 14,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-7/prebenjami-s7/grup-14',
            ],
            [
                'nom' => 'segona-divisio-femeni-juvenil',
                'grup' => 11,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-femeni/segona-divisio-femeni-juvenil/grup-11',
            ],
            [
                'nom' => 'segona-divisio-femeni-infantil',
                'grup' => 20,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-femeni/segona-divisio-femeni-infantil/grup-20',
            ],
            [
                'nom' => 'segona-divisio-femeni-alevi',
                'grup' => 12,
                'url_federacio' => 'https://www.fcf.cat/classificacio/2425/futbol-femeni/segona-divisio-femeni-alevi/grup-12',
            ],
        ];

        $this->db->table('equips')->insertBatch($data);
    }
}
