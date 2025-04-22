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
                'enllaç' => '/',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Contacte',
                'enllaç' => 'contacte',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Sobre Nosaltres',
                'enllaç' => 'sobreNosaltres',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Programes',
                'enllaç' => 'programes',
                'ordre' => 4,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Noticies',
                'enllaç' => 'noticies',
                'ordre' => 5,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Galeria',
                'enllaç' => 'galeria',
                'ordre' => 6,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Classificacio',
                'enllaç' => 'classificacio',
                'ordre' => 7,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Acces privat',
                'enllaç' => '', // Dropdown, sin enlace directo
                'ordre' => 8,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Iniciar sessio',
                'enllaç' => 'login',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 8
            ],
            [
                'nom' => 'Tancar sessio',
                'enllaç' => 'logout',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 8
            ],
            [
                'nom' => 'Gestio',
                'enllaç' => 'gestio',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => 8
            ]
        ];

        $this->db->table('configuracio')->insertBatch($data); 
    }
}
