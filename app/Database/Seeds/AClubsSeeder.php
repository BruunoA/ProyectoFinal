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
                // 'foto_club' => 'http://localhost/fileget/alpicatLogo.png',
                'created_at' => date('Y-m-d H:i:s'), 
            ],
            [
                'nom'    => 'Juvenil', 
                // 'foto_club' => 'http://localhost/fileget/alpicatLogo.png',
                'created_at' => date('Y-m-d H:i:s'), 
            ],
            [
                'nom'    => 'Cadet', 
                // 'foto_club' => 'http://localhost/fileget/alpicatLogo.png',
                'created_at' => date('Y-m-d H:i:s'), 
            ],
        ];

        $this->db->table('clubs')->insertBatch($data);
    }
}
