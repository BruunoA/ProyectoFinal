<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nom' => 'admin',
            'password' => password_hash('1234', PASSWORD_DEFAULT),
            'rol' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('users')->insert($data);

        $data = [
            'nom' => 'superadmin',
            'password' => password_hash('1234', PASSWORD_DEFAULT),
            'rol' => 'superadmin',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);
    }
}
