<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AClubsSeeder extends Seeder
{
    public function run()
    {

        $data= [
            [
                'nom'    => 'Amateur', 
                'estat' => 1,
                // 'foto_club' => 'http://localhost/fileget/alpicatLogo.png',
                'created_at' => date('Y-m-d H:i:s'), 
            ],
            [
                'nom'    => 'Juvenil', 
                'estat' => 1,
                // 'foto_club' => 'http://localhost/fileget/alpicatLogo.png',
                'created_at' => date('Y-m-d H:i:s'), 
            ],
            [
                'nom'    => 'Cadet', 
                'estat' => 1,
                // 'foto_club' => 'http://localhost/fileget/alpicatLogo.png',
                'created_at' => date('Y-m-d H:i:s'), 
            ],
        ];

        $this->db->table('clubs')->insertBatch($data);
    }
}
