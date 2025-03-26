<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;

class NoticiesController extends BaseController
{
    public function index()
    {
        $model = new GestioModel();
        // agafa tot lo que té com a secció noticies
        $data['gestio'] = $model->where('seccio', 'noticies')->findAll();
        // $data['gestio'] = $model->findAll();
        return view('noticies', $data);
    }
}
