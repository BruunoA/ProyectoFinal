<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TipusEventsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nom' => 'competicio', 'created_at' => date('Y-m-d H:i:s')],
            ['nom' => 'entrenament', 'created_at' => date('Y-m-d H:i:s')],
            ['nom' => 'activitat', 'created_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('tipus_events')->insertBatch($data);
    }
}
