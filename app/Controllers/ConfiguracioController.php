<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracioModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MenuModel;

class ConfiguracioController extends BaseController
{
    public function dades_contacte()
    {
        $model = new ConfiguracioModel();
        $data = [
            'dades_contacte' => $model->where('tipus', 'dades_contacte')->findAll(),
        ];

        return view('configuracio/dadesContacte', $data);
    }

    public function dades_contacteModify($id)
    {
        $model = new ConfiguracioModel();
        $data['dades_contacte'] = $model->find($id);
        return view('configuracio/dadesContacteModify', $data);
    }

    public function dades_contacteModify_post($id)
    {
        $model = new ConfiguracioModel();
        $data = [
            'nom' => $this->request->getPost('nom'),
            'valor' => $this->request->getPost('valor'),
        ];

        if (!$model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            $model->save($id, $data);
            return redirect()->to('/configuracio/dades_contacte');
        }
    }

    public function dades_contacteDelete($id)
    {
        $model = new ConfiguracioModel();
        $model->delete($id);
        return redirect()->to('/configuracio/dades_contacte');
    }

    public function menu(){
        
        $model = new ConfiguracioModel();

        $data['menu'] = $model->where('tipus', 'menu_general')->findAll();
        return view('configuracio/menu', $data);
    }

    public function menuGestio(){

        $model = new ConfiguracioModel();

        $data = [
            'menu' => $model->where('tipus', 'menu_gestio')->findAll(),
        ];

        return view('configuracio/menuGestio', $data);
    }

    public function menuModify($id)
    {
        $model = new ConfiguracioModel();
        $data['menu'] = $model->find($id);
        return view('configuracio/menuModify', $data);
    }

    public function menuModify_post($id)
    {
        $model = new ConfiguracioModel();
        $data = [
            'nom' => $this->request->getPost('nom'),
            'valor' => $this->request->getPost('valor'),
            'id_pare' => $this->request->getPost('id_pare'),
            'visibilitat' => $this->request->getPost('visibilitat'),
            'ordre' => $this->request->getPost('ordre')
        ];

        if (!$model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            $model->update($id, $data);
            return redirect()->to('/configuracio/menu');
        }
    }

    public function menuDelete($id)
    {
        $model = new ConfiguracioModel();
        $model->delete($id);
        return redirect()->to('/configuracio/menu');
    }

    public function menuAdd()
    {
        return view('configuracio/menuAdd');
    }

    public function menuAdd_post()
    {
        $model = new ConfiguracioModel();
        $data = [
            'nom' => $this->request->getPost('nom'),
            'enllaç' => $this->request->getPost('enllaç'),
            'id_pare' => $this->request->getPost('id_pare'),
            'visibilitat' => $this->request->getPost('visibilitat'),
            'ordre' => $this->request->getPost('ordre')
        ];

        if (!$model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            $model->insert($data);
            return redirect()->to('/configuracio/menu');
        }
    }


}
