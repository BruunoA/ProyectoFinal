<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracioModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ContacteModel;

class ContacteController extends BaseController
{
    public function index()
    {
        $model = new ConfiguracioModel();

        $data = [
            'ubicacio' => $model->where('nom', 'Ubicacio')->first(),
            'telefon' => $model->where('nom', 'Telefon')->first(),
            'correu' => $model->where('nom', 'Correu')->first(),
        ];

        return view('contacte', $data);
    }

    public function send()
    {
        helper(['form']);
        $contacteModel = new contacteModel();

        $validation = [
            'nom' => [
                'label' => 'Nom',
                'rules' => 'required',
                'errors' => [
                    'required' => lang('contacte.camp_nom'),
                ],
            ],
            'from_email' => [
                'label' => 'Correu electrònic',
                'rules' => 'required',
                'errors' => [
                    'required' => lang('contacte.camp_correu'),
                ],
            ],
            'assumpte' => [
                'label' => 'Assumpte',
                'rules' => 'required',
                'errors' => [
                    'required' => lang('contacte.camp_assumpte'),
                ],
            ],
            'text' => [
                'label' => 'Missatge',
                'rules' => 'required',
                'errors' => [
                    'required' => lang('contacte.camp_motiu'),
                ],
            ],
        ];

        $data = [
            'nom' => $this->request->getPost('nom'),
            'from_email' => $this->request->getPost('from_email'),
            'assumpte' => $this->request->getPost('assumpte'),
            'text' => $this->request->getPost('text'),
        ];

        if (!$this->validate($validation)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $contacteModel->insert($data);
        return redirect()->back()->with('success', '<div style="background-color: green; color: white; padding: 10px;">' . lang('contacte.Missatge_enviat') . '</div>');

    }
}
