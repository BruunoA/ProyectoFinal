<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;
use CodeIgniter\HTTP\ResponseInterface;

class GestioProgramesController extends BaseController
{
    public function programes()
    {
        $categorieModel = new CategoriesModel();
        $data['categories'] = $categorieModel->findAll();

        return view('gestio_pag/programes', $data);
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
        $data['categories'] = $categorieModel->find($id);

        return view('gestio_pag/modify_programes', $data);
    }

    public function modify_Programa_post($id)
    {
        $categorieModel = new CategoriesModel();
        
        $data = [
            'titol' => $this->request->getPost('titol'),
            'descripcio' => $this->request->getPost('descripcio'),
            'horari' => $this->request->getPost('horari'),
            'id_equip' => $this->request->getPost('id_equip'),
        ];

        // //  eliminación de imagen
        // if ($this->request->getPost('remove_image')) {
        //     $data['img'] = null;
        // }

        // // subida de nueva imagen
        // $img = $this->request->getFile('img');
        // if ($img && $img->isValid() && !$img->hasMoved()) {
        //     $newName = $img->getRandomName();
        //     $img->move(WRITEPATH . 'uploads', $newName);
        //     $data['img'] = 'uploads/' . $newName;
        // }

        // if (!$categorieModel->validate($data)) {
        //     return redirect()->back()
        //         ->withInput()
        //         ->with('errors', $categorieModel->errors())
        //         ->with('msg_type', 'red');
        // } else {
        //     $categorieModel->update($id, $data);
        //     return redirect()->to('/gestio/programes')
        //         ->with('msg', 'Programa actualizado correctamente')
        //         ->with('msg_type', 'green');
        // }
    }
}
