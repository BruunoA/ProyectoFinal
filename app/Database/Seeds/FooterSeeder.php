<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class FooterSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        $twitter = [
            'nom' => 'Twitter',
            'valor' => 'https://twitter.com/' . $fake->userName,
            'icona' => 'fa-brands fa-twitter',
            'tipus' => 'xarxes_socials',
        ];

        $this->db->table('configuracio')->insert($twitter);

        $facebook = [
            'nom' => 'Facebook',
            'valor' => 'https://facebook.com/' . $fake->userName,
            'icona' => 'fa-brands fa-facebook',
            'tipus' => 'xarxes_socials',
        ];

        $this->db->table('configuracio')->insert($facebook);

        $instagram = [
            'nom' => 'Instagram',
            'valor' => 'https://instagram.com/' . $fake->userName,
            'icona' => 'fa-brands fa-instagram',
            'tipus' => 'xarxes_socials',
        ];

        $this->db->table('configuracio')->insert($instagram);

    }
}
