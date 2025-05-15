<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;
use App\Models\ClassificacioModel;
use App\Models\ConfiguracioModel;
use CodeIgniter\HTTP\ResponseInterface;
use SIENSIS\KpaCrud\Libraries\KpaCrud;
use App\Models\EquipsModel;

class ProgramesController extends BaseController
{
    public function index()
    {
        return view('programes/programes');
    }

    public function categoria($segment)
    {
        // $urls = [
        //     'juvenil-segona-divisio' => ['categoria' => 'Juvenil segona divisio', 'grup' => 'Grup 46', 'titol' => 'Juvenil segona divisio'],
        //     'cadet-primera-divisio' => ['categoria' => 'Cadet primera divisio', 'grup' => 'Grup 14', 'titol' => 'Cadet primera divisio'],
        //     'tercera-catalana' => ['categoria' => 'Tercera catalana', 'grup' => 'Grup 14', 'titol' => 'Tercera catalana'],
        //     'segona-catalana' => ['categoria' => 'Segona catalana', 'grup' => 'Grup 5', 'titol' => 'Segona catalana'],
        //     'cadet-segona-divisio' => ['categoria' => 'Cadet segona divisio', 'grup' => 'Grup 55', 'titol' => 'Cadet segona divisio'],
        //     'infantil-segona-divisio-s14' => ['categoria' => 'Infantil segona divisio s14', 'grup' => 'Grup 28'],
        //     'primera-divisio-alevi-s11' => ['categoria' => 'Primera divisio alevi s11', 'grup' => 'Grup 9'],
        //     'segona-divisio-alevi-s12' => ['categoria' => 'Segona divisio alevi s12', 'grup' => 'Grup 22'],
        //     'segona-divisio-alevi-s11' => ['categoria' => 'Segona divisio alevi s11', 'grup' => 'Grup 17'],
        //     'preferent-alevi-s12' => ['categoria' => 'Preferent alevi s12', 'grup' => 'Grup 5'],
        // ];

        $menu = new ConfiguracioModel();

        $parametre = $menu->where('valor', 'programes/' . $segment)->where('tipus', 'menu_general')->where('visibilitat', 1)->first();

        $nomCategoria = $parametre['nom'];
        // $info = $urls[$segment];

        $modelProgrames = new CategoriesModel();
        $categoria = $modelProgrames->where('titol', $segment)->first();

        $model = new ClassificacioModel();
        $classificacio = $model->where('categoria', $nomCategoria)->findAll();

        $data = [
            'classificacio' => $classificacio,
            'categoria' => $categoria,
            'titol' => $nomCategoria,
        ];

        return view('programes/categoria', $data);
    }

    public function programes()
    {
        $categorieModel = new CategoriesModel();
        $programes = $categorieModel->orderBy('created_at', 'DESC')->paginate(4);

        $programes = $categorieModel->join('equips', 'categories.id_equip = equips.id', 'left')->orderBy('categories.created_at', 'DESC')->paginate(4);

        $pager = $categorieModel->pager;

        $data = [
            'categories' => $programes,
            'pager' => $pager,
        ];

        return view('gestio_pag/programes/programes', $data);
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
        $modelEquips = new EquipsModel();

        $data = [
            'categories' => $categorieModel->find($id),
            'equips' => $modelEquips->findAll(),
        ];

        return view('gestio_pag/programes/modify_programes', $data);
    }

    public function modify_Programa_post($id)
    {
        $categorieModel = new CategoriesModel();

        $img = $this->request->getPost('img');

        $imgCategoria = $categorieModel->find($id);

        if(empty($img)) {
            $img = $imgCategoria['img'];
        } else {
            $img = $this->request->getPost('img');
        }

        $validation = [
            'titol' => [
                'label' => 'Títol',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Títol és obligatori.',
                ],
            ],
            'horari' => [
                'label' => 'Horari',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Horari és obligatori.',
                ],
            ],
            'descripcio' => [
                'label' => 'Descripció',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Descripció és obligatori.',
                ],
            ],
            'id_equip' => [
                'label' => 'ID Equip',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Equip és obligatori.',
                ],
            ],
        ];

        $data = [
            'id' => $id,
            'titol' => $this->request->getPost('titol'),
            'horari' => $this->request->getPost('horari'),
            'descripcio' => $this->request->getPost('descripcio'),
            'id_equip' => $this->request->getPost('id_equip'),
            'img' => $img,
        ];

        if(!$this->validate($validation)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // dd($data);

        $categorieModel->save($data);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Programa modificat correctament</div>');
        return redirect()->to('/gestio/programes');
    }

    public function add()
    {
        $modelEquips = new EquipsModel();

        $equips = $modelEquips->findAll();

        $data = [
            'equips' => $equips,
        ];

        return view('gestio_pag/programes/add_programes', $data);
    }

    public function add_post()
    {
        $categorieModel = new CategoriesModel();

        $data = [
            'titol' => $this->request->getPost('titol'),
            'horari' => $this->request->getPost('horari'),
            'descripcio' => $this->request->getPost('descripcio'),
            'id_equip' => $this->request->getPost('id_equip'),
            'img' => $this->request->getPost('img'),
        ];

        $validation = [
            'titol' => [
                'label' => 'Títol',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Títol és obligatori.',
                ],
            ],
            'horari' => [
                'label' => 'Horari',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Horari és obligatori.',
                ],
            ],
            'descripcio' => [
                'label' => 'Descripció',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Descripció és obligatori.',
                ],
            ],
            'id_equip' => [
                'label' => 'ID Equip',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Equip és obligatori.',
                ],
            ],
            'img' => [
                'label' => 'Imatge',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Imatge és obligatori.',
                ],
            ],
        ];

        if(!$this->validate($validation)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $categorieModel->save($data);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Programa afegit correctament</div>');
        return redirect()->to('/gestio/programes');
    }

    public function equips()
    {
        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('equips');
        $crud->setPrimaryKey('id');

        $crud->setColumns(['nom']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => KpaCrud::NUMBER_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'grup' => ['name' => 'grup', 'type' => KpaCrud::NUMBER_FIELD_TYPE, 'html_atts' => ["required"],],
            'publicated_at' => ['name' => 'publicated_at', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
        ]);

        // $crud->setConfig('onlyView');
        $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);

        $data['output'] = $crud->render();

        return view('gestio_pag/programes/equips', $data);
    }
}
