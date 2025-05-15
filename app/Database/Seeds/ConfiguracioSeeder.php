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
                // 'icona' => 'fa-solid fa-house',
                'valor' => '/',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Contacte',
                'valor' => 'contacte',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Sobre Nosaltres',
                'valor' => 'sobreNosaltres',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Programes',
                'valor' => 'programes',
                'tipus' => 'menu_general',
                'ordre' => 4,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Juvenil',
                'valor' => 'programes/sub-19',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 4,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Juvenil segona divisio',
                'valor' => 'programes/juvenil-segona-divisio',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 5,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Cadet',
                'valor' => 'programes/cadet',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 4,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Cadet primera divisio',
                'valor' => 'programes/cadet-primera-divisio',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 8,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Cadet segona divisio',
                'valor' => 'programes/cadet-segona-divisio',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 8,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Amateur',
                'valor' => 'programes/amateur',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 4,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Tercera catalana',
                'valor' => 'programes/tercera-catalana',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 10,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Segona catalana',
                'valor' => 'programes/segona-catalana',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 10,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Infantil',
                'valor' => 'programes/infantil',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => 4,
                'zona' => 'superior'
            ],
            [   // ni ha dos
                'nom' => 'Infantil segona divisio S14',
                'valor' => 'programes/infantil-segona-divisio-s14',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 13,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Alevi',
                'valor' => 'programes/alevi',
                'tipus' => 'menu_general',
                'ordre' => 4,
                'visibilitat' => 1,
                'id_pare' => 4,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Primera divisio alevi S12',
                'valor' => 'programes/primera-divisio-alevi-s12',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 15,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Primera divisio alevi S11',
                'valor' => 'programes/primera-divisio-alevi-s11',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 15,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Segona divisio alevi S12',
                'valor' => 'programes/segona-divisio-alevi-s12',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => 15,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Segona divisio alevi S11',
                'valor' => 'programes/segona-divisio-alevi-s11',
                'tipus' => 'menu_general',
                'ordre' => 4,
                'visibilitat' => 1,
                'id_pare' => 15,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Preferent alevi S12',
                'valor' => 'programes/preferent-alevi-s12',
                'tipus' => 'menu_general',
                'ordre' => 5,
                'visibilitat' => 1,
                'id_pare' => 15,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Benjamins',
                'valor' => 'programes/benjamins',
                'tipus' => 'menu_general',
                'ordre' => 12,
                'visibilitat' => 1,
                'id_pare' => 4,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Primera divisio benjamins S10',
                'valor' => 'programes/primera-divisio-benjamins-s10',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 21,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Primera divisio benjamins S9',
                'valor' => 'programes/primera-divisio-benjamins-s9',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 21,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Prebenjami S8',
                'valor' => 'programes/prebenjami-s8',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => 21,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Prebenjami S7',
                'valor' => 'programes/prebenjami-s7',
                'tipus' => 'menu_general',
                'ordre' => 4,
                'visibilitat' => 1,
                'id_pare' => 21,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Femeni',
                'valor' => 'programes/femeni',
                'tipus' => 'menu_general',
                'ordre' => 15,
                'visibilitat' => 1,
                'id_pare' => 4,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Segona divisio femeni juvenil',
                'valor' => 'programes/segona-divisio-femeni-juvenil',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 26,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Segona divisio femeni infantil',
                'valor' => 'programes/segona-divisio-femeni-infantil',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 26,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Segona divisio femeni alevi',
                'valor' => 'programes/segona-divisio-femeni-alevi',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => 26,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Noticies',
                'valor' => 'noticies',
                'tipus' => 'menu_general',
                'ordre' => 5,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Galeria',
                'valor' => 'galeria',
                'tipus' => 'menu_general',
                'ordre' => 6,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Botiga',
                'valor' => 'botiga',
                'tipus' => 'menu_general',
                'ordre' => 7,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Acces privat',
                'valor' => '',
                'tipus' => 'menu_general',
                'ordre' => 8,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Iniciar sessio',
                'valor' => 'login',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 33,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Tancar sessio',
                'valor' => 'logout',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 33,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Gestio',
                'valor' => 'gestio',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => 33,
                'zona' => 'superior'
            ],
            [
                'nom' => 'Sobre nosaltres',
                'valor' => 'sobreNosaltres',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 3,
                'zona' => 'superior'
            ],
            [
                'nom' => 'El nostre staff',
                'valor' => 'staff',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 3,
                'zona' => 'superior'
            ],
        ];

        $this->db->table('configuracio')->insertBatch($data);

                $data3 = [
            [
                'nom' => 'Inici',
                // 'icona' => 'fa-solid fa-house',
                'valor' => '/',
                'tipus' => 'menu_general',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'inferior'
            ],
            [
                'nom' => 'Contacte',
                'valor' => 'contacte',
                'tipus' => 'menu_general',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'inferior'
            ],
            [
                'nom' => 'Sobre Nosaltres',
                'valor' => 'sobreNosaltres',
                'tipus' => 'menu_general',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'inferior'
            ],
            [
                'nom' => 'Noticies',
                'valor' => 'noticies',
                'tipus' => 'menu_general',
                'ordre' => 5,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'inferior'
            ],
            [
                'nom' => 'Galeria',
                'valor' => 'galeria',
                'tipus' => 'menu_general',
                'ordre' => 6,
                'visibilitat' => 1,
                'id_pare' => null,
                'zona' => 'inferior'
            ]
        ];

        $this->db->table('configuracio')->insertBatch($data3);

        $data2 = [
            [
                'nom' => 'Inici',
                'valor' => '/',
                'tipus' => 'menu_gestio',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Sobre Nosaltres',
                'valor' => 'gestio/sobreNosaltres',
                'tipus' => 'menu_gestio',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Programes',
                'valor' => 'gestio/programes',
                'tipus' => 'menu_gestio',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Noticies/Events',
                'valor' => '',
                'tipus' => 'menu_gestio',
                'ordre' => 4,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Notícies',
                'valor' => 'gestio/noticies',
                'tipus' => 'menu_gestio',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 4
            ],
            [
                'nom' => 'Events',
                'valor' => 'gestio/events',
                'tipus' => 'menu_gestio',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 4
            ],
            [
                'nom' => 'Galeria',
                'valor' => 'gestio/galeria',
                'tipus' => 'menu_gestio',
                'ordre' => 5,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Configuracio',
                'valor' => '',
                'tipus' => 'menu_gestio',
                'ordre' => 6,
                'visibilitat' => 1,
                'id_pare' => null
            ],
            [
                'nom' => 'Dades contacte',
                'valor' => 'configuracio/dades_contacte',
                'tipus' => 'menu_gestio',
                'ordre' => 1,
                'visibilitat' => 1,
                'id_pare' => 8
            ],
            [
                'nom' => 'Menu general',
                'valor' => 'config/menu_general',
                'tipus' => 'menu_gestio',
                'ordre' => 2,
                'visibilitat' => 1,
                'id_pare' => 8
            ],
            [
                'nom' => 'Menu gestio',
                'valor' => 'config/menu_gestio',
                'tipus' => 'menu_gestio',
                'ordre' => 3,
                'visibilitat' => 1,
                'id_pare' => 8
            ],
            [
                'nom' => 'Footer',
                'valor' => 'configuracio/footer',
                'tipus' => 'menu_gestio',
                'ordre' => 4,
                'visibilitat' => 1,
                'id_pare' => 8
            ],
        ];

        $this->db->table('configuracio')->insertBatch($data2);
    }
}
