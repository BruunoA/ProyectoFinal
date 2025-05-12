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
        $urlMapa = $model->where('nom', 'Enllaç mapa')->first();

        $data = [
            'ubicacio' => $model->where('nom', 'Ubicacio')->first(),
            'telefon' => $model->where('nom', 'Telefon')->first(),
            'correu' => $model->where('nom', 'Correu')->first(),
            'assumptes' => $assumptes,
            'urlMapa' => $urlMapa['valor'],
        ];

        // dd($urlMapa['valor']);

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
        ];

        $data = [
            'nom' => $this->request->getPost('nom'),
            'from_email' => $this->request->getPost('from_email'),
            'telefon' => $this->request->getPost('telefon'),
            'id_assumpte' => $this->request->getPost('assumpte'),
            'text' => $this->request->getPost('text'),
        ];

        if (!$this->validate($validation)) {
            return redirect()->back()->withInput()/*->with('errors', $this->validator->getErrors())*/;
        }

        $contacteModel->insert($data);
        return redirect()->back()->with('success', '<div style="background-color: green; color: white; padding: 10px;">' . lang('contacte.Missatge_enviat') . '</div>');
    }

    public function email()
    {
        $contacteModel = new ContacteModel();

        $model = new AssumptesModel();
        $assumptes = $model->paginate(4);

        $pager = $model->pager;



        $data = [
            'assumptes' => $assumptes,
            // agafa tots els camps de la taula contacte, incloent el nom de l'assumpte de la taula assumptes
            // compara el id de l'assumpte amb id_assumpte de contacte
            'contactes' => $contacteModel->select('contacte.*, assumptes.nom as nom_assumpte')->join('assumptes', 'assumptes.id = contacte.id_assumpte', 'left')->findAll(),
            'pager' => $model->pager,
        ];

        return view('gestio_pag/correu/email', $data);
    }

    public function emailSend($id)
    {
        $contacteModel = new ContacteModel();
        $contacte = $contacteModel->find($id);

        if (!$contacte) {
            return redirect()->to('gestio/email')->with('error', 'Missatge no trobat');
        }

        $data = [
            'missatge_original' => $contacte['text'],
            'email_remitent' => $contacte['to'],
            'id' => $id
        ];
        return view('gestio_pag/correu/email_view', $data);
    }

    public function emailSend_post($id)
    {
        $email = $this->request->getPost('email');
        $mensaje = $this->request->getPost('mensaje');

        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('Respuesta a tu mensaje');
        $emailService->setMessage($mensaje);

        if ($emailService->send()) {
            session()->setFlashdata('success', 'Respuesta enviada correctamente');
        } else {
            session()->setFlashdata('error', 'Error al enviar el correo');
        }

        return redirect()->to('/gestio/email');
    }

    public function deleteEmail($id)
    {
        $contacteModel = new ContacteModel();
        $contacteModel->delete($id);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Email esborrat correctament</div>');
        return redirect()->to('/gestio/email');
    }

    public function assumptes(){

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
