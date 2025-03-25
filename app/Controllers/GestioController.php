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
        $validation = \Config\Services::validation();
        helper(["form"]);
        
        $event = $this->request->getPost('seccio');

        $rules = [
            'nom' => 'required',
            'resum' => 'required',
            'seccio' => 'required',
            'contingut' => 'required'
        ];
        
        if ($event === 'event') {
            unset($rules['contingut']);
        }
    
        $data = [
            'nom' => $this->request->getPost('nom'),
            'resum' => $this->request->getPost('resum'),
            'seccio' => $this->request->getPost('seccio'),
            'contingut' => $this->request->getPost('editordata'),
            'url' => mb_url_title($this->request->getPost('nom'), '-', true)
        ];

        $validation->setRules($rules);

         if($this->validate($rules)){
            $model = new GestioModel();
            $model->insert($data);
            return redirect()->to('/gestio');
        }else {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
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
            'contingut' => $this->request->getPost('editordata'),
            'url' => mb_url_title($this->request->getPost('nom'), '-', true)
        ];  
        
        if (!$model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            $model->update($id, $data);
            return redirect()->to('/gestio');
        }
    }
}
