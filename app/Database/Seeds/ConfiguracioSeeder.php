<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ConfiguracioSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nom' => 'Inici',
                'valor' => '/',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Contacte',
                'valor' => 'contacte',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Sobre Nosaltres',
                'valor' => 'sobreNosaltres',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Programes',
                'valor' => 'programes',
                'tipus' => 'menu_general',
                'ordre' => 4,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Noticies',
                'valor' => 'noticies',
                'tipus' => 'menu_general',
                'ordre' => 5,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Galeria',
                'valor' => 'galeria',
                'tipus' => 'menu_general',
                'ordre' => 6,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Classificacio',
                'valor' => 'classificacio',
                'tipus' => 'menu_general',
                'ordre' => 7,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Acces privat',
                'valor' => '', // Dropdown, sin enlace directo
                'tipus' => 'menu_general',
                'ordre' => 8,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Iniciar sessio',
                'valor' => 'login',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 8
            ],
            [
                'nom' => 'Tancar sessio',
                'valor' => 'logout',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 8
            ],
            [
                'nom' => 'Gestio',
                'valor' => 'gestio',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => 8
            ]
        ];

        $this->db->table('configuracio')->insertBatch($data); 
    }
}
