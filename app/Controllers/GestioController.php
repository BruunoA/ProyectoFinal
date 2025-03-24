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
        helper(["form"]);
        // TODO: VEURE COM FER PER A QUE SI ES EVENT, QUE L'ULTIM CAMP NO SIGUI OBLIGATORI
    
        $data = [
            'nom' => $this->request->getPost('nom'),
            'resum' => $this->request->getPost('resum'),
            'seccio' => $this->request->getPost('seccio'),
            'contingut' => $this->request->getPost('editordata')
        ];

        $model = new GestioModel();

        if (!$model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            $model->insert($data);
            return redirect()->to('/gestio');
        }
        
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
        return view('gestio_pag/modify', $data);
    }

    public function update($id)
    {
        helper(["form"]);
        $model = new GestioModel();
        $data = [
            'nom' => $this->request->getPost('nom'),
            'resum' => $this->request->getPost('resum'),
            'seccio' => $this->request->getPost('seccio'),
            'contingut' => $this->request->getPost('editordata')
        ];  
        // TODO: ACABAR DE VEURE PER QUE NO FA LA VALIDACIO DEL CAMP CONTINGUT
        if (!$model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            $model->update($id, $data);
            return redirect()->to('/gestio');
        }
    }
}
