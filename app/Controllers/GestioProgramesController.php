<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;
use App\Models\EquipsModel;
use CodeIgniter\HTTP\ResponseInterface;

class GestioProgramesController extends BaseController
{
    public function programes()
    {
        $categorieModel = new CategoriesModel();
        $programes= $categorieModel->orderBy('created_at', 'DESC')->paginate(4);

        $pager = $categorieModel->pager;

        $data = [
            'categories' => $programes,
            'pager' => $pager,
        ];

        return view('gestio_pag/programes/programes', $data);
    }

    public function delete_Programa($id)
    {
        $categorieModel = new CategoriesModel();
        $categorieModel->delete($id);

        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Programa esborrat correctament</div>');
        return redirect()->to('/gestio/programes');
    }

    public function modify_Programa($id)
    {
        $categorieModel = new CategoriesModel();
        $modelEquips = new EquipsModel();

        $data = [
            'categories' => $categorieModel->find($id),
            'equips' => $modelEquips->findAll(),
        ];

        return view('gestio_pag/programes/modify_programes', $data);
    }

    public function modify_Programa_post($id)
    {
        $categorieModel = new CategoriesModel();

        $data = [
            'id' => $id,
            'titol' => $this->request->getPost('titol'),
            'horari' => $this->request->getPost('horari'),
            'descripcio' => $this->request->getPost('descripcio'),
            'id_equip' => $this->request->getPost('id_equip'),
            'img' => $this->request->getPost('img'),
        ];

        dd($data);

        $categorieModel->save($data);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Programa modificat correctament</div>');
        return redirect()->to('/gestio/programes');
    }

    public function add()
    {
        $modelEquips = new EquipsModel();

        $equips = $modelEquips->findAll();

        $data = [
            'equips' => $equips,
        ];

        return view('gestio_pag/programes/add_programes', $data);
    }

    public function add_post()
    {
        $categorieModel = new CategoriesModel();

        $data = [
            'titol' => $this->request->getPost('titol'),
            'horari' => $this->request->getPost('horari'),
            'descripcio' => $this->request->getPost('descripcio'),
            'id_equip' => $this->request->getPost('id_equip'),
            'img' => $this->request->getPost('img'),
        ];

        $categorieModel->save($data);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Programa afegit correctament</div>');
        return redirect()->to('/gestio/programes');
    }
}
