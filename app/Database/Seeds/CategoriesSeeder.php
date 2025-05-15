<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");

        $data = [
            [
                'titol' => 'juvenil-segona-divisio',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dilluns=> 12:40 - 14:00',
                'id_equip' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'cadet-primera-divisio',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dijous => 12:40 - 14:00 | Dissabte => 10:00 - 11:30',
                'id_equip' => 2,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'tercera-catalana',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dissabte => 12:00 - 13:30 | Diumenge => 10:00 - 11:30',
                'id_equip' => 3,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'segona-catalana',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dijous, divendres, dissabte',
                'id_equip' => 4,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'cadet-segona-divisio',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dilluns, dimarts, dimecres',
                'id_equip' => 5,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'infantil-segona-divisio-s14',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dijous, divendres, dissabte',
                'id_equip' => 6,
                'created_at' => date('Y-m-d H:i:s')
            ],
            // [
            //     'titol' => 'infantil-segona-divisio',    // mateix que a dalt
            //     'descripcio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            //     'img' => 'http://localhost/fileget/programes.jpg',
            //     'horari' => 'Dilluns, dimarts, dimecres',
            //     'id_equip' => 7,
            //     'created_at' => date('Y-m-d H:i:s')
            // ],
            [
                'titol' => 'primera-divisio-alevi-s11',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dijous, divendres, dissabte',
                'id_equip' => 7,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'segona-divisio-alevi-s12',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dilluns, dimarts, dimecres',
                'id_equip' => 8,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'segona-divisio-alevi-s11',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dijous, divendres, dissabte',
                'id_equip' => 9,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'preferent-alevi-s12',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dilluns, dimarts, dimecres',
                'id_equip' => 10,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'primera-divisio-benjami-s10',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dijous, divendres, dissabte',
                'id_equip' => 11,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'primera-divisio-benjami-s9',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dilluns, dimarts, dimecres',
                'id_equip' => 12,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'prebenjami-s8',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dijous, divendres, dissabte',
                'id_equip' => 13,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'prebenjami-s7',
                'descripcio' => $fake->sentence(30),
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dilluns, dimarts, dimecres',
                'id_equip' => 14,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'segona-divisio-femeni-juvenil',
                'descripcio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dijous, divendres, dissabte',
                'id_equip' => 15,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'segona-divisio-femeni-infantil',
                'descripcio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dilluns, dimarts, dimecres',
                'id_equip' => 16,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'titol' => 'segona-divisio-femeni-alevi',
                'descripcio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'img' => 'http://localhost/fileget/programes.jpg',
                'horari' => 'Dilluns, dimarts, dimecres',
                'id_equip' => 17,
                'created_at' => date('Y-m-d H:i:s')
            ],
            // ['titol'] = > $faker->words(
        ];

        $this->db->table('categories')->insertBatch($data);

        // $this->db->enableForeignKeyChecks(); // Reactiva las restricciones FK
    }
}
