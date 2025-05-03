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
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Contacte',
                'valor' => 'contacte',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Sobre Nosaltres',
                'valor' => 'sobreNosaltres',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Programes',
                'valor' => 'programes',
                'tipus' => 'menu_general',
                'ordre' => 4,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Sub-19',
                'valor' => 'programes/sub-19',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom'=> 'Juvenil Segona',
                'valor' => 'programes/juvenil_segona',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Amateur',
                'valor' => 'programes/amateur',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
               'nom' => 'Amateur Segona',
                'valor' => 'programes/amateur_segona',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Amateur Tercera',
                'valor' => 'programes/amateur_tercera',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Sub-16',
                'valor' => 'programes/sub16',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Cadet Primera A',
                'valor' => 'programes/cadet_primera_A',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Cadet Segona B',
                'valor' => 'programes/cadet_segona_B',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Sub-14',
                'valor' => 'programes/sub16',
                'tipus' => 'menu_general',
                'ordre' => 4,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            // [
            //     'nom' => 'Infantil',
            //     'valor' => 'programes/infantil',
            //     'tipus' => 'menu_general',
            //     'ordre' => 5,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //     'nom' => 'Cadet',
            //     'valor' => 'programes/cadet',
            //     'tipus' => 'menu_general',
            //     'ordre' => 6,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //     'nom' => 'Juvenil',
            //     'valor' => 'programes/juvenil',
            //     'tipus' => 'menu_general',
            //     'ordre' => 7,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //     'nom' => 'Amateur',
            //     'valor' => 'programes/amateur_segona',
            //     'tipus' => 'menu_general',
            //     'ordre' => 8,
            //     'visibilitat' => "Si",
            //     'id_pare' => 12
            // ],
            // [
            //     'nom' => 'Veterans',
            //     'valor' => 'programes/veterans',
            //     'tipus' => 'menu_general',
            //     'ordre' => 9,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //     'nom' => 'Entrenaments especials',
            //     'valor' => 'programes/entrenaments_especials',
            //     'tipus' => 'menu_general',
            //     'ordre' => 9,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            [
                'nom' => 'Noticies',
                'valor' => 'noticies',
                'tipus' => 'menu_general',
                'ordre' => 5,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Galeria',
                'valor' => 'galeria',
                'tipus' => 'menu_general',
                'ordre' => 6,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Classificacio',
                'valor' => 'classificacio',
                'tipus' => 'menu_general',
                'ordre' => 7,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Acces privat',
                'valor' => '',
                'tipus' => 'menu_general',
                'ordre' => 8,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Iniciar sessio',
                'valor' => 'login',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => "Si",
                'id_pare' => 8
            ],
            [
                'nom' => 'Tancar sessio',
                'valor' => 'logout',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => "Si",
                'id_pare' => 8
            ],
            [
                'nom' => 'Gestio',
                'valor' => 'gestio',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => "Si",
                'id_pare' => 8
            ]
        ];

        $this->db->table('configuracio')->insertBatch($data);

        $data2 = [
            [
                'nom' => 'Inici',
                'valor' => '/',
                'tipus' => 'menu_gestio',
                'ordre' => 1,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Sobre Nosaltres',
                'valor' => 'gestio/sobreNosaltres',
                'tipus' => 'menu_gestio',
                'ordre' => 2,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Programes',
                'valor' => 'gestio/programes',
                'tipus' => 'menu_gestio',
                'ordre' => 3,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Noticies/Events',
                'valor' => '',
                'tipus' => 'menu_gestio',
                'ordre' => 4,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Notícies',
                'valor' => 'gestio/noticies',
                'tipus' => 'menu_gestio',
                'ordre' => 1,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Events',
                'valor' => 'gestio/events',
                'tipus' => 'menu_gestio',
                'ordre' => 2,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Galeria',
                'valor' => 'gestio/galeria',
                'tipus' => 'menu_gestio',
                'ordre' => 5,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Configuracio',
                'valor' => '',
                'tipus' => 'menu_gestio',
                'ordre' => 6,
                'visibilitat' => "Si",
                'id_pare' => null
            ],
            [
                'nom' => 'Dades contacte',
                'valor' => 'configuracio/dades_contacte',
                'tipus' => 'menu_gestio',
                'ordre' => 1,
                'visibilitat' => "Si",
                'id_pare' => 8
            ],
            [
                'nom' => 'Menu general',
                'valor' => 'config/menu_general',
                'tipus' => 'menu_gestio',
                'ordre' => 2,
                'visibilitat' => "Si",
                'id_pare' => 8
            ],
            [
                'nom' => 'Menu gestio',
                'valor' => 'config/menu_gestio',
                'tipus' => 'menu_gestio',
                'ordre' => 3,
                'visibilitat' => "Si",
                'id_pare' => 8
            ],
            [
                'nom' => 'Footer',
                'valor' => 'configuracio/footer',
                'tipus' => 'menu_gestio',
                'ordre' => 4,
                'visibilitat' => "Si",
                'id_pare' => 8
            ],
        ];

        $this->db->table('configuracio')->insertBatch($data2);
    }
}
