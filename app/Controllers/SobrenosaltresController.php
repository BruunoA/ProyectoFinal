<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CarrecsModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;
use App\Models\StaffModel;
use SIENSIS\KpaCrud\Libraries\KpaCrud;

class SobreNosaltresController extends BaseController
{
    public function index()
    {
        $model = new GestioModel();
        $data = [
            'historia' => $model->where('id_seccio', 2)->where('estat', 1)->first(),
            'missio' => $model->where('id_seccio', 3)->where('estat', 1)->first(),
            'visio' => $model->where('id_seccio', 4)->where('estat', 1)->first(),
            'valors' => $model->where('id_seccio', 5)->where('estat', 1)->first(),
        ];
        return view('sobreNosaltres', $data);
    }

    public function sobreNosaltres()
    {
        $model = new GestioModel();

        $data = [
            'historia' => $model->where('id_seccio', 2)->findAll(),
            'missio' => $model->where('id_seccio', 3)->findAll(),
            'visio' => $model->where('id_seccio', 4)->findAll(),
            'valors' => $model->where('id_seccio', 5)->findAll(),
        ];

        // dd($data);

        return view('gestio_pag/sobreNosaltres', $data);
    }

    public function staff()
    {
        $model = new StaffModel();
        $model->select('staff.*, carrecs.nom as nom_carrec')->join('carrecs', 'staff.id_carrec = carrecs.id');
        $staff = $model->where('estat', 1)->findAll();

        $agrupar = [];
        foreach ($staff as $persona) {
            $agrupar[$persona['nom_carrec']][] = $persona;
        }

        $data = [
            'carrecs' => $agrupar,
        ];

        return view('staff', $data);
    }


    public function gestioStaff()
    {
        $model = new StaffModel();

        $model->select('staff.*, carrecs.nom as nom_carrec')->join('carrecs', 'staff.id_carrec = carrecs.id');

        $staff = $model->paginate(5);
        $pager = $model->pager;

        $data = [
            'staff' => $staff,
            'pager' => $model->pager,
        ];

        return view('gestio_pag/staff/staff', $data);
    }

    public function staffAdd()
    {
        $model = new CarrecsModel();
        $carrecs = $model->findAll();

        $data = [
            'carrecs' => $carrecs,
        ];
        return view('gestio_pag/staff/staff_create', $data);
    }

    public function staffAdd_post()
    {
        $model = new StaffModel();

        $rules = [
            'nom' => [
                'label' => 'Nom',
                'rules' => 'required|min_length[3]|max_length[70]',
                'errors' => [
                    'required' => 'El camp nom és obligatori.',
                    'min_length' => 'El camp nom ha de tenir almenys 3 caràcters.',
                    'max_length' => 'El camp nom no pot superar els 70 caràcters.',
                ]
            ],
            'carrec' => [
                'label' => 'Càrrec',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp càrrec és obligatori.',
                ]
            ],
            'imatge' => [
                'label' => 'Imatge',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp imatge és obligatori.',
                ]
            ],
            'descripcio' => [
                'label' => 'Descripció',
                'rules' => 'required|max_length[400]',
                'errors' => [
                    'required' => 'El camp descripció és obligatori.',
                    'max_length' => 'El camp descripció no pot superar els 400 caràcters.',
                ]
            ],
            'estat' => [
                'label' => 'Estat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp estat és obligatori.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nom' => $this->request->getPost('nom'),
            'id_carrec' => $this->request->getPost('carrec'),
            'img' => $this->request->getPost('imatge'),
            'descripcio' => $this->request->getPost('descripcio'),
            'estat' => $this->request->getPost('estat'),
        ];

        // dd($data);

        if ($model->insert($data)) {
            return redirect()->to(base_url('gestio/staff'))->with('success', '<div style="background-color:green;color:white;padding:10px;">Registre creat correctament</div>');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function staffModify($id)
    {
        $model = new StaffModel();
        $carrecsModel = new CarrecsModel();

        $staff = $model->find($id);
        $carrecs = $carrecsModel->findAll();

        $data = [
            'staff' => $staff,
            'carrecs' => $carrecs,
        ];

        return view('gestio_pag/staff/staff_modify', $data);
    }

    public function staffModify_post($id)
    {
        $model = new StaffModel();

        $rules = [
            'nom' => [
                'label' => 'Nom',
                'rules' => 'required|min_length[3]|max_length[70]',
                'errors' => [
                    'required' => 'El camp nom és obligatori.',
                    'min_length' => 'El camp nom ha de tenir almenys 3 caràcters.',
                    'max_length' => 'El camp nom no pot superar els 70 caràcters.',
                ]
            ],
            'carrec' => [
                'label' => 'Càrrec',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp càrrec és obligatori.',
                ]
            ],
            'imatge' => [
                'label' => 'Imatge',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp imatge és obligatori.',
                ]
            ],
            'descripcio' => [
                'label' => 'Descripció',
                'rules' => 'required|max_length[400]',
                'errors' => [
                    'required' => 'El camp descripció és obligatori.',
                    'max_length' => 'El camp descripció no pot superar els 400 caràcters.',
                ]
            ],
            'estat' => [
                'label' => 'Estat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp estat és obligatori.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'id' => $id,
            'nom' => $this->request->getPost('nom'),
            'id_carrec' => $this->request->getPost('carrec'),
            'img' => $this->request->getPost('imatge'),
            'descripcio' => $this->request->getPost('descripcio'),
            'estat' => $this->request->getPost('estat'),
        ];

        if ($model->save($data)) {
            return redirect()->to(base_url('gestio/staff'))->with('success', '<div style="background-color:green;color:white;padding:10px;">Registre modificiar correctament</div>');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function staffDelete($id)
    {
        $model = new StaffModel();

        if ($model->delete($id)) {
            return redirect()->to(base_url('gestio/staff'))->with('success', '<div style="background-color:green;color:white;padding:10px;">Registre eliminat correctament</div>');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function gestioCarrecs(){
         $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('carrecs');
        $crud->setPrimaryKey('id');

        $crud->setColumns(['nom']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
]);

        // $crud->setConfig('onlyView');
        // $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);
        $crud->setConfig('modify', true);

        $data['output'] = $crud->render();

        return view('gestio_pag/staff/carrecs', $data);
    }
}
