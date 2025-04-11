<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom'         => 'Inici',
                'enllac'      => '/',
                'id_pare'     => null,
                'visibilitat' => true,
                'ordre'       => 1,
                'id_tag'      => null,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nom'         => 'Contacte',
                'enllac'      => 'contacte',
                'id_pare'     => null,
                'visibilitat' => true,
                'ordre'       => 2,
                'id_tag'      => null,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nom'         => 'Sobre Nosaltres',
                'enllac'      => 'sobreNosaltres',
                'id_pare'     => null,
                'visibilitat' => true,
                'ordre'       => 3,
                'id_tag'      => null,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nom'         => 'Programes',
                'enllac'      => 'programes',
                'id_pare'     => null,
                'visibilitat' => true,
                'ordre'       => 4,
                'id_tag'      => null,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nom'         => 'Noticies',
                'enllac'      => 'noticies',
                'id_pare'     => null,
                'visibilitat' => true,
                'ordre'       => 5,
                'id_tag'      => null,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nom'         => 'Galeria',
                'enllac'      => 'galeria',
                'id_pare'     => null,
                'visibilitat' => true,
                'ordre'       => 6,
                'id_tag'      => null,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nom'         => 'Classificacio',
                'enllac'      => 'classificacio',
                'id_pare'     => null,
                'visibilitat' => true,
                'ordre'       => 7,
                'id_tag'      => null,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nom'         => 'Accés Privat',
                'enllac'      => '',
                'id_pare'     => null,
                'visibilitat' => true,
                'ordre'       => 8,
                'id_tag'      => null,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nom'         => 'Iniciar Sessió',
                'enllac'      => 'login',
                'id_pare'     => 8,
                'visibilitat' => true,
                'ordre'       => 1,
                'id_tag'      => null,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nom'         => 'Tancar Sessió',
                'enllac'      => 'logout',
                'id_pare'     => 8,
                'visibilitat' => true,
                'ordre'       => 2,
                'id_tag'      => null,
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            // [
            //     'nom'         => 'Gestió',
            //     'enllaç'      => 'gestio',
            //     'id_pare'     => 8,
            //     'visibilitat' => true,
            //     'ordre'       => 3,
            //     'id_tag'      => null,
            //     'created_at'  => date('Y-m-d H:i:s'),
            // ],
        ];

        $this->db->table('menu')->insertBatch($data);
    }
}
