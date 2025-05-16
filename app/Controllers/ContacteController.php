<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssumptesModel;
use App\Models\ConfiguracioModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ContacteModel;
use SIENSIS\KpaCrud\Libraries\KpaCrud;

class ContacteController extends BaseController
{
    public function index()
    {
        $model = new ConfiguracioModel();
        $modelAssupmtes = new AssumptesModel();
        $assumptes = $modelAssupmtes->findAll();
        $dadesContacte = $model->where('nom !=', 'Enllaç mapa')->where('tipus', 'dades_contacte')->findAll();
        $urlMapa = $model->where('nom', 'Enllaç mapa')->first();

        $data = [
            // 'ubicacio' => $model->where('nom', 'Ubicacio')->first(),
            // 'telefon' => $model->where('nom', 'Telefon')->first(),
            // 'correu' => $model->where('nom', 'Correu')->first(),
            'dades' => $dadesContacte,
            'assumptes' => $assumptes,
            'urlMapa' => $urlMapa['valor'],
        ];

        // dd($urlMapa['valor']);

        return view('contacte', $data);
    }

    public function email()
    {
        $contacteModel = new ContacteModel();
        $data['contactes'] = $contacteModel->findAll();

        return view('gestio_pag/correu/email', $data);
    }

    public function send()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
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
            'telefon' => [
                'label' => 'Telefon',
                'rules' => 'required|regex_match[/^\d{9}$/]',
                'errors' => [
                    'required' => lang('contacte.camp_telefon'),
                    'regex_match' => lang('contacte.camp_telefon'),
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
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nom' => $this->request->getPost('nom'),
            'from_email' => $this->request->getPost('from_email'),
            'id_assumpte' => $this->request->getPost('assumpte'),
            'text' => $this->request->getPost('text'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $contacteModel = new ContacteModel();
        $contacteModel->insert($data);

        $email = \Config\Services::email();

        $email->setFrom('fcalpicat@capalabs.com', 'Administrador Picat');
        $email->setTo('fcalpicat@capalabs.com');
        $email->setSubject('Nuevo mensaje de contacto: ' . $data['id_assumpte']);

        $missatge = "Has recibido un nuevo mensaje de contacto:\n\n";
        $missatge .= "Nombre: {$data['nom']}\n";
        $missatge .= "Email: {$data['from_email']}\n";
        $missatge .= "Asunto: {$data['id_assumpte']}\n";
        $missatge .= "Mensaje:\n{$data['text']}\n";

        $email->setMessage($missatge);

        if ($email->send()) {
            return redirect()->to('/contacte')->with('success', 'El teu missatge s\'ha enviat correctament');
        } else {
            return redirect()->to('/contacte')->with('error', 'Ha hagut un problema.');
        }
    }


    public function emailSend($id)
    {
        $contacteModel = new ContacteModel();
        $contacte = $contacteModel->find($id);

        if (!$contacte) {
            return redirect()->to('/gestio/correu/mail')->with('error', 'Missatge no trobat');
        }

        $data = [
            'contacte' => $contacte,
            'id' => $id,
            'missatge_original' => $contacte['text'],
            'email_remitent' => $contacte['from_email'],
            'nom_remitent' => $contacte['nom'],
            'assumpte_original' => $contacte['id_assumpte']
        ];

        return view('gestio_pag/correu/email_view', $data);
    }

    public function emailSend_post($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'mensaje' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $mensaje = $this->request->getPost('mensaje');

        $contacteModel = new ContacteModel();
        $contacte = $contacteModel->find($id);

        if (!$contacte) {
            return redirect()->to('/gestio/mail')->with('error', 'Missatge no trobat');
        }

        $email = \Config\Services::email();

        $cossMissatge = "Resposta al teu missatge:\n\n";
        $cossMissatge .= "---------- Missatge Original ----------\n";
        $cossMissatge .= "De: {$contacte['nom']} <{$contacte['from_email']}>\n";
        $cossMissatge .= "Assumpte: {$contacte['id_assumpte']}\n";
        $cossMissatge .= "Data: {$contacte['created_at']}\n\n";
        $cossMissatge .= "{$contacte['text']}\n\n";
        $cossMissatge .= "---------- Resposta ----------\n";
        $cossMissatge .= $mensaje;

        try {
            $email->setFrom('fcalpicat@capalabs.com', 'Administrador Picat');
            $email->setTo($contacte['from_email']);
            $email->setSubject('Re: ' . $contacte['assumpte']);
            $email->setMessage($cossMissatge);

            if ($email->send()) {
                return redirect()->to('/gestio/email')->with('success', 'Resposta enviada correctament a ' . $contacte['from_email']);
            } else {
                return redirect()->to('/gestio/email')->with('error', 'Error en enviar: ' . $email->printDebugger(['headers']));
            }
        } catch (\Exception $e) {
            return redirect()->to('/gestio/email')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function deleteEmail($id)
    {
        $contacteModel = new ContacteModel();
        $contacteModel->delete($id);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Email esborrat correctament</div>');
        return redirect()->to('/gestio/email');
    }

    public function assumptes()
    {

        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('assumptes');
        $crud->setPrimaryKey('id');

        $crud->setColumns(['nom']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
        ]);

        $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);

        $data['output'] = $crud->render();

        return view('gestio_pag/correu/assumptes', $data);
    }
}
