<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class NoticiesController extends BaseController
{
    public function index()
    {
        $model = new GestioModel();
        $data['gestio'] = $model->findAll();
        return view('noticies', $data);
    }
}
