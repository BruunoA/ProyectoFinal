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
        $contacteModel = new contacteModel();
        $email = \Config\Services::email();
        $cfg = config('Email');
        $email->initialize($cfg);

        $data = [
            'nom' => $this->request->getPost('nom'),
            'from_email' => $this->request->getPost('from_email'),
            'assumpte' => $this->request->getPost('assumpte'),
            'text' => $this->request->getPost('text'),
        ];

        if ($contacteModel->insert($data)) {
            $email->setTo($this->request->getPost('from_email')); //saber a que correo enviar el missatge
            $email->setSubject('Nou missatge de contacte');
            $email->setMessage("Nom: " . $this->request->getPost('nom') . "\n" .
                                "Email: " . $this->request->getPost('from_email') . "\n" .
                                "Assumpte: " . $this->request->getPost('assumpte') . "\n\n" .
                                $this->request->getPost('text'));

            if ($email->send()) {
                return redirect()->to('/contacte')->with('success', 'Missatge enviat correctament!');
            } else {
                echo $email->printDebugger();
                die;
                return redirect()->to('/contacte')->with('error', 'Error en enviar el missatge.');
            }
        } else {
            return view('contacte', [
                'validation' => $contacteModel->errors(),
                'error' => 'No se pudo guardar el mensaje. Intente de nuevo.'
            ]);
        }
        
    }
}
