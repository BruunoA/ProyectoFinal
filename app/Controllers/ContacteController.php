<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ContacteController extends BaseController
{
    public function index()
    {
        return view('contacte');
    }

    public function send()
    {
        $contacteModel = new \App\Models\ContacteModel();

        $data = [
            'nom' => $this->request->getPost('nom'),
            'from_email' => $this->request->getPost('from_email'),
            'assumpte' => $this->request->getPost('assumpte'),
        ];

        if ($contacteModel->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Contact information saved successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to save contact information.']);
        }
    }
}
