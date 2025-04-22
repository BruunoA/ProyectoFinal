<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GestioModel;
use CodeIgniter\HTTP\ResponseInterface;

class IndexController extends BaseController
{

    public function home()
    {
        $model = new GestioModel();

        $data = [
            'noticies' => $model->where('seccio', 'noticies')->where('destacat', 'si')->orderBy('created_at', 'desc')->findAll(),
        ];

        return view("home", $data);
    }

    public function index()
    {
        return view("inici");
    }
}
