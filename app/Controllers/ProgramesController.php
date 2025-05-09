<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;
use App\Models\ClassificacioModel;
use App\Models\ConfiguracioModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProgramesController extends BaseController
{
    public function index()
    {
        return view('programes/programes');
    }

    public function categoria($segment)
    {
        // $urls = [
        //     'juvenil-segona-divisio' => ['categoria' => 'Juvenil segona divisio', 'grup' => 'Grup 46', 'titol' => 'Juvenil segona divisio'],
        //     'cadet-primera-divisio' => ['categoria' => 'Cadet primera divisio', 'grup' => 'Grup 14', 'titol' => 'Cadet primera divisio'],
        //     'tercera-catalana' => ['categoria' => 'Tercera catalana', 'grup' => 'Grup 14', 'titol' => 'Tercera catalana'],
        //     'segona-catalana' => ['categoria' => 'Segona catalana', 'grup' => 'Grup 5', 'titol' => 'Segona catalana'],
        //     'cadet-segona-divisio' => ['categoria' => 'Cadet segona divisio', 'grup' => 'Grup 55', 'titol' => 'Cadet segona divisio'],
        //     'infantil-segona-divisio-s14' => ['categoria' => 'Infantil segona divisio s14', 'grup' => 'Grup 28'],
        //     'primera-divisio-alevi-s11' => ['categoria' => 'Primera divisio alevi s11', 'grup' => 'Grup 9'],
        //     'segona-divisio-alevi-s12' => ['categoria' => 'Segona divisio alevi s12', 'grup' => 'Grup 22'],
        //     'segona-divisio-alevi-s11' => ['categoria' => 'Segona divisio alevi s11', 'grup' => 'Grup 17'],
        //     'preferent-alevi-s12' => ['categoria' => 'Preferent alevi s12', 'grup' => 'Grup 5'],
        // ];

        $menu = new ConfiguracioModel();

        $parametre = $menu->where('valor', 'programes/' . $segment)->where('tipus', 'menu_general')->where('visibilitat', 1)->first();

        $nomCategoria = $parametre['nom'];
        // $info = $urls[$segment];

        $modelProgrames = new CategoriesModel();
        $categoria = $modelProgrames->where('titol', $segment)->first();

        $model = new ClassificacioModel();
        $classificacio = $model->where('categoria', $nomCategoria)->findAll();

        $data = [
            'classificacio' => $classificacio,
            'categoria' => $categoria,
            'titol' => $nomCategoria,
        ];

        return view('programes/categoria', $data);
    }
}
