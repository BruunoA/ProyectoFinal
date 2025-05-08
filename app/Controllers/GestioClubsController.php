<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClubsModel;
use CodeIgniter\HTTP\ResponseInterface;

class GestioClubsController extends BaseController
{
    public function clubs(){
        $model = new ClubsModel();

        $data = [
            'clubs' => $model->findAll(),
        ];

        return view('gestio_pag/clubs/clubs', $data);
    }

    public function clubsDelete($id)
    {
        $model = new ClubsModel();
        $model->delete($id);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Registre esborrat correctament</div>');
        return redirect()->back();
    }

    public function clubsAdd()
    {
        $model = new ClubsModel();

        $data = [
            'clubs' => $model->findAll(),
        ];

        return view('gestio_pag/clubs/club_add', $data);
    }

    public function clubsAdd_post(){

        helper(['form']);

        $model = new ClubsModel();

        $rules = [
            'nom' => [
                'label' => 'Nom',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Nom és obligatori.',
                ],
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Foto és obligatori.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nom' => $this->request->getPost('nom'),
            'foto_club' => $this->request->getPost('foto'),
        ];

        $model->insert($data);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Registre creat correctament</div>');
        return redirect()->to(base_url('gestio/clubs'));
    }
}
