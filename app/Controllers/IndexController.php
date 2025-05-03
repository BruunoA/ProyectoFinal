<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GestioModel;
use App\Models\TagsModel;
use CodeIgniter\HTTP\ResponseInterface;

class IndexController extends BaseController
{
    public function index()
    {
        $model = new TagsModel();

        $data = [
            'tags' => $model->findAll(),
        ];

        return view("pagina_inicial", $data);
    }

    public function home()
    {
        $model = new GestioModel();

        $data = [
            'noticies' => $model->where('seccio', 'noticies')->where('destacat', 'si')->orderBy('created_at', 'desc')->findAll(),
        ];

        return view("home", $data);
    }

    public function equipo2(){
        return view("equipo2");
    }

    public function equipo3(){
        return view("equipo3");
    }
}
