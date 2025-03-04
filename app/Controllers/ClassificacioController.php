<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ClassificacioController extends BaseController
{
    public function index()
    {
        $data = [
            'títol' => 'Classificació',
            'resultats' => [
                ['equip_v' => 'Alpicat', 'equip_l' => 'Lleida', 'gols_v' => 3, 'gols_l' => 1],
                ['equip_v' => 'Balaguer', 'equip_l' => 'Alpicat', 'gols_v' => 2, 'gols_l' => 2],
            ],
            'taula' => [
                ['posicio' => 1, 'equip' => 'Alpicat', 'punts' => 30, 'pj' => 7, 'pg' => 6, 'pe' => 1, 'pp' => 0, 'gf' => 18, 'gc' => 3, 'dg' => 15],
                ['posicio' => 2, 'equip' => 'Lleida', 'punts' => 28, 'pj' => 7, 'pg' => 5, 'pe' => 2, 'pp' => 0, 'gf' => 14, 'gc' => 5, 'dg' => 9],
            ],
        ];        

        return view('classificacio', $data);
    }
}
