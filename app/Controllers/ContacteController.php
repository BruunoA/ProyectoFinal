<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ContacteModel;

class ContacteController extends BaseController
{
    public function index()
    {
        return view('contacte');
    }

    public function send()
    {
        $contacteModel = new contacteModel();

        $data = [
            'nom' => $this->request->getPost('nom'),
            'from_email' => $this->request->getPost('from_email'),
            'assumpte' => $this->request->getPost('assumpte'),
            'text' => $this->request->getPost('text'),
        ];

        if ($contacteModel->insert($data)) {
            return view('contacte_enviat');
        } else {
            return view('contacte', [
                'validation' => $contacteModel->errors(),
                'error' => 'No se pudo guardar el mensaje. Intente de nuevo.'
            ]);
        }
        
    }
}
