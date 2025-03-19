<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;

class GestioController extends BaseController
{
    public function index()
    {
        return view('gestio_pag/add');
    }

    public function add()
    {
        $data = [
            'nom' => $this->request->getPost('nom'),
            'resum' => $this->request->getPost('resum'),
            'seccio' => $this->request->getPost('seccio'),
            'contingut' => $this->request->getPost('editordata')
        ];

        $model = new GestioModel();
        $model->insert($data);
        return redirect()->to('/gestio');
    }

    public function gestio()
    {
        $model = new GestioModel();
        $data['gestio'] = $model->findAll();
        return view('gestio_pag/gestio', $data);
    }

    public function delete($id)
    {
        $model = new GestioModel();
        $model->delete($id);
        return redirect()->to('/gestio');
    }

    public function edit($id)
    {
        $model = new GestioModel();
        $data['gestio'] = $model->find($id);
        return view('edit', $data);
    }
}
