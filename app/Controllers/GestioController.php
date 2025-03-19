<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;

class GestioController extends BaseController
{
    public function index()
    {
        return view('add');
    }

    public function add()
    {
        $data = [
            'nom' => $this->request->getPost('nom'),
            'resum' => $this->request->getPost('resum'),
            'seccio' => $this->request->getPost('seccio'),
            'contingut' => $this->request->getPost('editordata')
        ];
        // var_dump($data);
        // die;
        $model = new GestioModel();
        $model->insert($data);
        return view('add', $data);
    }
}
