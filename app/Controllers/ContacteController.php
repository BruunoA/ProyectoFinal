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
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nom' => 'required',
            'from_email' => 'required|valid_email',
            'assumpte' => 'required',
            'text' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nom' => $this->request->getPost('nom'),
            'from_email' => $this->request->getPost('from_email'),
            'assumpte' => $this->request->getPost('assumpte'),
            'text' => $this->request->getPost('text'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $contacteModel = new ContacteModel();
        $contacteModel->insert($data);

        $email = \Config\Services::email();

        $email->setFrom('fcalpicat@capalabs.com', 'Administrador Picat');
        $email->setTo('fcalpicat@capalabs.com'); 
        $email->setSubject('Nuevo mensaje de contacto: ' . $data['assumpte']);

        $mensaje = "Has recibido un nuevo mensaje de contacto:\n\n";
        $mensaje .= "Nombre: {$data['nom']}\n";
        $mensaje .= "Email: {$data['from_email']}\n";
        $mensaje .= "Asunto: {$data['assumpte']}\n";
        $mensaje .= "Mensaje:\n{$data['text']}\n";

        $email->setMessage($mensaje);

        if ($email->send()) {
            return redirect()->to('/contacte')->with('success', 'Tu mensaje ha sido enviado. Nos pondremos en contacto contigo pronto.');
        } else {
            return redirect()->to('/contacte')->with('error', 'El mensaje se ha guardado, pero hubo un problema al notificar al administrador.');
        }
    }
}
