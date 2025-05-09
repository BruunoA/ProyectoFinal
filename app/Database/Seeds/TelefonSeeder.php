<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TelefonSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("ca_ES");

        $nom = "Telefon";
        $telefon = $fake->phoneNumber();
    
        $data = [
            'nom' => $nom,
            'valor' => $telefon,
            'tipus' => 'dades_contacte',
            'visibilitat' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];
    
    $this->db->table('configuracio')->insert($data);

    $data = [
        'nom' => 'Enllaç mapa',
        'valor' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d745.0913701723812!2d0.5514229867548115!3d41.66944958758179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a71eaf593a5081%3A0x85412f105933abd3!2sCamp%20Municipal%20de%20Alpicat%20-%20Club%20Atl%C3%A8tic%20d%E2%80%99Alpicat!5e0!3m2!1ses!2ses!4v1741114931620!5m2!1ses!2ses',
        'tipus' => 'dades_contacte',
        'visibilitat' => 1,
        'created_at' => date('Y-m-d H:i:s'),
    ];

    $this->db->table('configuracio')->insert($data);
    }
}
