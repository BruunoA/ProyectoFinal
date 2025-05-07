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
                'valor' => '/home',
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
                'nom' => 'Juvenil segona divisio',
                'valor' => 'programes/juvenil-segona-divisio',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Cadet primera divisio',
                'valor' => 'programes/cadet-primera-divisio',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Tercera catalana',
                'valor' => 'programes/tercera-catalana',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Segona catalana',
                'valor' => 'programes/segona-catalana',
                'tipus' => 'menu_general',
                'ordre' => 4,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Cadet segona divisio',
                'valor' => 'programes/cadet-segona-divisio',
                'tipus' => 'menu_general',
                'ordre' => 5,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Infantil segona divisio S14',
                'valor' => 'programes/infantil-segona-divisio-s14',
                'tipus' => 'menu_general',
                'ordre' => 6,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Primera divisio alevi S11',
                'valor' => 'programes/primera-divisio-alevi-s11',
                'tipus' => 'menu_general',
                'ordre' => 7,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Segona divisio alevi S12',
                'valor' => 'programes/segona-divisio-alevi-s12',
                'tipus' => 'menu_general',
                'ordre' => 8,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Segona divisio alevi S11',
                'valor' => 'programes/segona-divisio-alevi-s11',
                'tipus' => 'menu_general',
                'ordre' => 9,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Preferent alevi S12',
                'valor' => 'programes/preferent-alevi-s12',
                'tipus' => 'menu_general',
                'ordre' => 10,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Primera divisio benjamins S10',
                'valor' => 'programes/primera-divisio-benjamins-s10',
                'tipus' => 'menu_general',
                'ordre' => 11,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Primera divisio benjamins S9',
                'valor' => 'programes/primera-divisio-benjamins-s9',
                'tipus' => 'menu_general',
                'ordre' => 12,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Prebenjami S8',
                'valor' => 'programes/prebenjami-s8',
                'tipus' => 'menu_general',
                'ordre' => 13,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Prebenjami S7',
                'valor' => 'programes/prebenjami-s7',
                'tipus' => 'menu_general',
                'ordre' => 14,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Segona divisio femeni juvenil',
                'valor' => 'programes/segona-divisio-femeni-juvenil',
                'tipus' => 'menu_general',
                'ordre' => 15,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Segona divisio femeni infantil',
                'valor' => 'programes/segona-divisio-femeni-infantil',
                'tipus' => 'menu_general',
                'ordre' => 16,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            [
                'nom' => 'Segona divisio femeni alevi',
                'valor' => 'programes/segona-divisio-femeni-alevi',
                'tipus' => 'menu_general',
                'ordre' => 17,
                'visibilitat' => "Si",
                'id_pare' => 4
            ],
            // [
            //     'nom' => 'Sub-19',
            //     'valor' => 'programes/sub-19',
            //     'tipus' => 'menu_general',
            //     'ordre' => 1,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //     'nom'=> 'Juvenil Segona',
            //     'valor' => 'programes/juvenil_segona',
            //     'tipus' => 'menu_general',
            //     'ordre' => 1,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //     'nom' => 'Amateur',
            //     'valor' => 'programes/amateur',
            //     'tipus' => 'menu_general',
            //     'ordre' => 2,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //    'nom' => 'Amateur Segona',
            //     'valor' => 'programes/amateur_segona',
            //     'tipus' => 'menu_general',
            //     'ordre' => 1,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //     'nom' => 'Amateur Tercera',
            //     'valor' => 'programes/amateur_tercera',
            //     'tipus' => 'menu_general',
            //     'ordre' => 2,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //     'nom' => 'Sub-16',
            //     'valor' => 'programes/sub16',
            //     'tipus' => 'menu_general',
            //     'ordre' => 3,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //     'nom' => 'Cadet Primera A',
            //     'valor' => 'programes/cadet_primera_A',
            //     'tipus' => 'menu_general',
            //     'ordre' => 1,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //     'nom' => 'Cadet Segona B',
            //     'valor' => 'programes/cadet_segona_B',
            //     'tipus' => 'menu_general',
            //     'ordre' => 2,
            //     'visibilitat' => "Si",
            //     'id_pare' => 4
            // ],
            // [
            //     'nom' => 'Sub-14',
            //     'valor' => 'programes/sub16',
            //     'tipus' => 'menu_general',
            //     'ordre' => 4,
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
                'id_pare' => 17
            ],
            [
                'nom' => 'Tancar sessio',
                'valor' => 'logout',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => "Si",
                'id_pare' => 17
            ],
            [
                'nom' => 'Gestio',
                'valor' => 'gestio',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => "Si",
                'id_pare' => 17
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
