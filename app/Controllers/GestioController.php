<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\CategoriesModel;
use App\Models\ConfiguracioModel;
use App\Models\EventsModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;
use App\Models\MenuModel;
use App\Models\ClubsModel;
use App\Models\SeccionsModel;
use App\Models\TaulaFotosModel;
use CodeIgniter\Files\File;
use SIENSIS\KpaCrud\Libraries\KpaCrud;


class GestioController extends BaseController
{
    public function index()
    {

        $model = new ClubsModel();
        $modelSeccions = new SeccionsModel();

        $data = [
            'clubs' => $model->findAll(),
            'seccions' => $modelSeccions->findAll(),
        ];

        return view('gestio_pag/add', $data);
    }

    public function add()
    {

        helper(["form"]);

        $model = new SeccionsModel();
        $seccio = $this->request->getPost('seccio');
        $seccioID = $model->where('nom', $seccio)->select('id')->first();

        $rules = [
            'nom' => [
                'label' => 'Nom',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp nom és obligatori.',
                ]
            ],
            'resum' => [
                'label' => 'Resum',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp resum és obligatori.',
                ]
            ],
            'seccio' => [
                'label' => 'Secció',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp secció és obligatori.',
                ]
            ],
            'id_club' => [
                'label' => 'Club',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp club és obligatori.',
                ]
            ],
            'estat' => [
                'label' => 'Estat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp estat és obligatori.',
                ]
            ],
            'ckeditor' => [
                'label' => 'Contingut',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp contingut és obligatori.',
                ]
            ],
        ];

        if ($seccio === 'Notícies') {
            $rules['portada'] = [
                'label' => 'Portada',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp portada és obligatori.',
                ]
            ];
        } else if ($seccio === 'Banner') {
            $rules['resum']['rules'] = 'permit_empty';
            $rules['id_club']['rules'] = 'permit_empty';
        } else if ($seccio === 'Logo') {
            $rules['resum']['rules'] = 'permit_empty';
            $rules['id_club']['rules'] = 'permit_empty';
        }

        $data = [
            'nom' => $this->request->getPost('nom'),
            'resum' => $this->request->getPost('resum'),
            'id_seccio' => $seccioID,
            'id_club' => $this->request->getPost('id_club'),
            'estat' => $this->request->getPost('estat'),
            'data' => $this->request->getPost('data'),
            'portada' => $this->request->getPost('portada'),
            'contingut' => $this->request->getPost('ckeditor'),
            'url' => mb_url_title($this->request->getPost('nom'), '-', true)
        ];

        if ($this->validate($rules)) {
            $model = new GestioModel();
            $model->insert($data);
            return redirect()->to('/gestio');
        } else {
            return redirect()->back()->withInput();
        }

        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Registre creat correctament</div>');

        if ($seccio == 'Notícies') {
            return redirect()->to('/gestio/noticies');
        } else if ($seccio == 'Banner' || $seccio == 'Logo') {
            return redirect()->to('/gestio/banner');
        } else if ($seccio == 'Història' || $seccio == 'Missió' || $seccio == 'Visió' || $seccio == 'Valors') {
            return redirect()->to('/gestio/sobreNosaltres');
        } else {
            return redirect()->to('/gestio');
        }
    }

    public function delete($id)
    {
        $model = new GestioModel();
        $model->delete($id);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Registre esborrat correctament</div>');
        return redirect()->back();
    }

    public function edit($id)
    {
        $model = new GestioModel();
        $modelClubs = new ClubsModel();
        $modelSeccions = new SeccionsModel();


        $data = [
            'gestio' => $model->find($id),
            'clubs' => $modelClubs->findAll(),
            'seccions' => $modelSeccions->findAll(),
        ];

        return view('gestio_pag/modify', $data);
    }

    public function update($id)
    {

        helper(["form"]);

        $model = new SeccionsModel();
        $seccio = $this->request->getPost('seccio');
        $seccioID = $model->where('nom', $seccio)->select('id')->first();

        $rules = [
            'nom' => [
                'label' => 'Nom',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp nom és obligatori.',
                ]
            ],
            'resum' => [
                'label' => 'Resum',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp resum és obligatori.',
                ]
            ],
            'seccio' => [
                'label' => 'Secció',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp secció és obligatori.',
                ]
            ],
            'id_club' => [
                'label' => 'Club',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp club és obligatori.',
                ]
            ],
            'estat' => [
                'label' => 'Estat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp estat és obligatori.',
                ]
            ],
            'ckeditor' => [
                'label' => 'Contingut',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp contingut és obligatori.',
                ]
            ],
        ];

        if ($seccio === 'Notícies') {
            $rules['portada'] = [
                'label' => 'Portada',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp portada és obligatori.',
                ]
            ];
        } else if ($seccio === 'Banner') {
            $rules['resum']['rules'] = 'permit_empty';
            $rules['id_club']['rules'] = 'permit_empty';
        } else if ($seccio === 'Logo') {
            $rules['resum']['rules'] = 'permit_empty';
            $rules['id_club']['rules'] = 'permit_empty';
        }

        $data = [
            'nom' => $this->request->getPost('nom'),
            'resum' => $this->request->getPost('resum'),
            'id_seccio' => $seccioID,
            'id_club' => $this->request->getPost('id_club'),
            'estat' => $this->request->getPost('estat'),
            'data' => $this->request->getPost('data'),
            'portada' => $this->request->getPost('portada'),
            'contingut' => $this->request->getPost('ckeditor'),
            'url' => mb_url_title($this->request->getPost('nom'), '-', true)
        ];

        if ($this->validate($rules)) {
            $model = new GestioModel();
            $model->update($id, $data);
        } else {
            return redirect()->back()->withInput();
        }

        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Registre modificat correctament</div>');


        if ($seccio == 'Notícies') {
            return redirect()->to('/gestio/noticies');
        } else if ($seccio == 'Banner' || $seccio == 'Logo') {
            return redirect()->to('/gestio/banner');
        } else if ($seccio == 'Història' || $seccio == 'Missió' || $seccio == 'Visió' || $seccio == 'Valors') {
            return redirect()->to('/gestio/sobreNosaltres');
        } else {
            return redirect()->to('/gestio');
        }
    }


    public function upload_drag()
    {
        helper(["form"]);

        $model = new AlbumModel();
        $data = [
            'albums' => $model->findAll(),
        ];
        $data['errors'] = [];

        return view('gestio_pag/fotos/upload_form_drag', $data);
    }

    public function upload_drag_post()
    {
        $data['title'] = "Multiple file uploader";

        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[userfile,3072]'
                    . '|max_dims[userfile,2024,2024]',
                'errors' => [
                    'uploaded' => 'El camp imatge és obligatori.',
                    'is_image' => 'El fitxer no és una imatge.',
                    'mime_in' => 'El fitxer no és una imatge vàlida.',
                    'max_size' => 'La mida de la imatge no pot ser superior a 3MB.',
                    'max_dims' => 'La imatge no pot ser superior a 2024x2024 píxels.',
                ]
            ],
            'titol' => [
                'label' => 'Títol',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp títol és obligatori.',
                ]
            ],
            'album' => [
                'label' => 'Àlbum',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp àlbum és obligatori.',
                ]
            ],
        ];

        if (!$this->validate($validationRule)) {
            // $data['errors'] = $this->validator->getErrors();
            return redirect()->back()->withInput();
            // return view('gestio_pag/upload_form_drag', $data);
        }

        if ($imagefile = $this->request->getFiles()) {
            $i = 0;
            $files = [];
            $model = new TaulaFotosModel();

            // agafar el proxim id
            $proximID = $model->getNextID();

            // nom de la carpeta a crear, on es guardara la imatge
            $carpeta = $this->request->getPost('album');
            $carpeta = mb_url_title($carpeta, '-', true);
            $ruta = FCPATH . 'uploads/' . $carpeta;


            // dd($ruta);

            if (!is_dir($ruta)) {
                mkdir($ruta, 0777, true);
            }

            // agafer id del album, pel nom que s'ha seleccionat al formulari
            $albumModel = new AlbumModel();
            $album = $albumModel->where('titol', $this->request->getPost('album'))->first();
            $idAlbum = $album['id'];


            foreach ($imagefile['userfile'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $i++;

                    $currentDate = date('YmdHis');
                    $ext = $img->getClientExtension();

                    $newName = $currentDate . '_' . $proximID . '.' . $ext;
                    $titol = $this->request->getPost('titol');
                    $nom_fitxer = $img->getClientName();
                    $descripcio = $this->request->getPost('descripcio');

                    $fotoData = [
                        'titol' => $titol,
                        'nom_fitxer' => $newName,
                        'descripcio' => $descripcio,
                        'ruta' => 'uploads/' . $carpeta . '/' . $newName,
                        'mime_type' => $img->getClientMimeType(),
                        'id_album' => $idAlbum,
                    ];

                    // if (!empty($idAlbum)) {
                    //     $fotoData['id_album'] = $idAlbum;
                    // }

                    $model->insert($fotoData);

                    $proximID++;

                    $img->move($ruta, $newName);

                    $files[$i] = new File($ruta . '/' . $newName);
                }
            }

            $data['files'] = $files;
            // return view('gestio_pag/upload_ok', $data);
            session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Imatges pujades correctament</div>');
            return redirect()->to('/gestio/galeria');
        }
    }


    public function events()
    {
        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('events');
        $crud->setPrimaryKey('id');

        $crud->setColumns(['id', 'nom', 'data', 'estat']);

        $dataActual = date('Y-m-d H:i:s');

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'descripcio' => ['name' => 'descripcio', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'publicated_at' => ['name' => 'publicated_at', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'data' => ['name' => 'data', 'type' => KpaCrud::DATE_FIELD_TYPE, 'default' => $dataActual, 'html_atts' => ["required"],],
            'estat' => ['name' => 'estat',  'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => [1 => 'Publicat', 0 => 'No publicat'],],
        ]);

        // $crud->setConfig('onlyView');
        $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);

        $data['output'] = $crud->render();

        return view('gestio_pag/events/events', $data);
    }

    public function banner()
    {

        // $model = new TaulaFotosModel();

        // $data = [
        //     'banner' => $model->where('banner', 'si')->findAll(),
        // ];

        $model = new GestioModel();

        $banners = $model->where('seccio', 'banner')->orderBy('created_at', 'DESC')->paginate(6);
        $logos = $model->where('seccio', 'logo')->orderBy('created_at', 'DESC')->paginate(6);

        $pager = $model->pager;

        $data = [
            'banner' => $banners,
            'logo' => $logos,
            'pager' => $model->pager,
        ];

        // dd($data);

        return view('gestio_pag/banner/banner', $data);
    }

    public function seccions()
    {
        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('seccions');
        $crud->setPrimaryKey('id');

        $crud->setColumns(['nom']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            // 'created_at' => ['name' => 'created_at', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
        ]);

        // $crud->setConfig('onlyView');
        $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);

        $data['output'] = $crud->render();

        return view('gestio_pag/seccions', $data);
    }

    public function clubs()
    {

        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('clubs');
        $crud->setPrimaryKey('id');

        $crud->setColumns(['nom']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            // 'created_at' => ['name' => 'created_at', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
        ]);

        // $crud->setConfig('onlyView');
        $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);

        $data['output'] = $crud->render();

        return view('gestio_pag/seccions', $data);
    }

    // public function bannerDelete($id)
    // {

    //     $model = new TaulaFotosModel();
    //     $model->where('id', $id)->delete();

    //     session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Banner esborrat correctament</div>');
    //     return redirect()->to('/gestio/banner');
    // }

    // public function bannerModify($id)
    // {

    //     $model = new TaulaFotosModel();
    //     $data['banner'] = $model->find($id);

    //     return view('gestio_pag/banner/banner_modify', $data);
    // }

    // public function bannerModify_post($id)
    // {

    //     helper(["form"]);

    //     $validationRule = [
    //         'titol' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'El camp Títol és obligatori.',
    //             ]
    //         ],
    //         'descripcio' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'El camp Descripció és obligatori.',
    //             ]
    //         ],
    //         'ruta' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'El camp Imatge és obligatori.',
    //             ]
    //         ],
    //         'banner' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'El camp Destacat banner és obligatori.',
    //             ]
    //         ],
    //     ];

    //     $model = new TaulaFotosModel();
    //     $data = [
    //         'id' => $id,
    //         'titol' => $this->request->getPost('titol'),
    //         'descripcio' => $this->request->getPost('descripcio'),
    //         'ruta' => $this->request->getPost('ruta'),
    //         'banner' => $this->request->getPost('banner'),
    //     ];

    //     if (!$this->validate($validationRule)) {
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }

    //     $model->save($data);
    //     session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Banner modificat correctament</div>');
    //     return redirect()->to('/gestio/banner');

    //     // if ($model->save($data)) {
    //     //     session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Banner modificat correctament</div>');
    //     //     return redirect()->to('/gestio/banner');
    //     // } else {
    //     //     return redirect()->back()->withInput()->with('errors', $model->errors());
    //     // }
    // }

    // public function bannerAdd()
    // {
    //     return view('gestio_pag/banner/banner_create');
    // }

    // public function bannerAdd_post()
    // {
    //     helper(["form"]);

    //     $validationRule = [
    //         'titol' => [
    //             'label' => 'Títol',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'El camp Títol és obligatori.',
    //             ]
    //         ],
    //         'ruta' => [
    //             'label' => 'Imatge',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'El camp Imatge és obligatori.',
    //             ]
    //         ],
    //         'banner' => [
    //             'label' => 'Destacat banner',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'El camp Destacat banner és obligatori.',
    //             ]
    //         ],
    //     ];


    //     $model = new TaulaFotosModel();

    //     $data = [
    //         'titol' => $this->request->getPost('titol'),
    //         'descripcio' => $this->request->getPost('descripcio'),
    //         'ruta' => $this->request->getPost('ruta'),
    //         'banner' => $this->request->getPost('banner'),
    //     ];

    //     if (!$this->validate($validationRule)) {
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }

    //     $model->insert($data);
    //     session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Banner creat correctament</div>');
    //     return redirect()->to('/gestio/banner');
    // }
}
