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
                ['posicio' => 1, 'equip' => 'Alpicat', 'punts' => 30, 'partits_jugats' => 7, 'partits_guanyats' => 6, 'partits_empatats' => 1, 'partits_perduts' => 0, 'gols_favor' => 18, 'gols_en_contra' => 3, 'diferencia_gols' => 15],
                ['posicio' => 2, 'equip' => 'Lleida', 'punts' => 28, 'partits_jugats' => 7, 'partits_guanyats' => 5, 'partits_empatats' => 2, 'partits_perduts' => 0, 'gols_favor' => 14, 'gols_en_contra' => 5, 'diferencia_gols' => 9],
            ],
        ];        

        return view('classificacio', $data);
    }
}
