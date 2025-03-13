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
                ['posicio' => 3, 'equip' => 'Balaguer', 'punts' => 20, 'pj' => 7, 'pg' => 3, 'pe' => 1, 'pp' => 3, 'gf' => 10, 'gc' => 10, 'dg' => 0],
            //     ['posicio' => 4, 'equip' => 'Tàrrega', 'punts' => 15, 'pj' => 7, 'pg' => 1, 'pe' => 3, 'pp' => 3, 'gf' => 5, 'gc' => 10, 'dg' => -5],
            //     ['posicio' => 5, 'equip' => 'Mollerussa', 'punts' => 10, 'pj' => 7, 'pg' => 0, 'pe' => 2, 'pp' => 5, 'gf' => 2, 'gc' => 15, 'dg' => -13],
            //     ['posicio' => 6, 'equip' => 'Artesa', 'punts' => 5, 'pj' => 7, 'pg' => 0, 'pe' => 1, 'pp' => 6, 'gf' => 1, 'gc' => 16, 'dg' => -15],
            //     ['posicio' => 7, 'equip' => 'Tàrrega B', 'punts' => 0, 'pj' => 7, 'pg' => 0, 'pe' => 0, 'pp' => 7, 'gf' => 0, 'gc' => 21, 'dg' => -21],
            //     ['posicio' => 8, 'equip' => 'Alcarràs', 'punts' => 0, 'pj' => 7, 'pg' => 0, 'pe' => 0, 'pp' => 7, 'gf' => 0, 'gc' => 21, 'dg' => -21]
            ],
        ];        

        return view('classificacio', $data);
    }
}
