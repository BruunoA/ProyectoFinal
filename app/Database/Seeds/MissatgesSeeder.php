<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;


class MissatgesSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 0; $i < 4; $i++) {
            $nom = $fake->firstName();
            $assumpte = $fake->numberBetween(1, 4);
            $text = $fake->paragraph(2);
            $from_email = $fake->email();
            // $to = $fake->email();
            // $resposta = $fake->sentence(3);
            $data = [
                'nom' => $nom,
                'id_assumpte' => $assumpte,
                'text' => $text,
                'from_email' => $from_email,
                // 'to' => $to,
                // 'resposta' => $resposta,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->table('contacte')->insert($data);
        }
    }
}
