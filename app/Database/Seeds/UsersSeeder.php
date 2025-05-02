<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 0; $i < 4; $i++) {
            $nom = $fake->firstName();
            $data = [
                'nom' => $fake->firstName(),
                'password' => password_hash(1234, PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->table('users')->insert($data);
        }

        $data = [
            'nom' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'rol' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('users')->insert($data);
    }
}
