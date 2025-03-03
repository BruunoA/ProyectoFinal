<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ClassificacioController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Classificació',
            'resultados' => [
                ['equipo_v' => 'Alpicat', 'equipo_l' => 'Lleida', 'goles_v' => 3, 'goles_l' => 1],
                ['equipo_v' => 'Balaguer', 'equipo_l' => 'Alpicat', 'goles_v' => 2, 'goles_l' => 2],
            ],
            'tabla' => [
                ['posicion' => 1, 'equipo' => 'Alpicat', 'puntos' => 30, 'partidos_jugados' => 7, 'partidos_ganados' => 6, 'partidos_empatados' => 1, 'partidos_perdidos' => 0, 'goles_favor' => 18, 'goles_contra' => 3, 'diferencia_goles' => 15],
                ['posicion' => 2, 'equipo' => 'Lleida', 'puntos' => 28, 'partidos_jugados' => 7, 'partidos_ganados' => 5, 'partidos_empatados' => 2, 'partidos_perdidos' => 0, 'goles_favor' => 14, 'goles_contra' => 5, 'diferencia_goles' => 9],
            ],
        ];

        return view('classificacio', $data);
    }
}
