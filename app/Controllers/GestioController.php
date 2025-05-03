<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\ConfiguracioModel;
use App\Models\EventsModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;
use App\Models\MenuModel;
use App\Models\TaulaFotosModel;
use CodeIgniter\Files\File;
use SIENSIS\KpaCrud\Config\KpaCrud;

class GestioController extends BaseController
{
    public function index()
    {
        // $model = new ConfiguracioModel();
        // $data['menuGestio'] = $model->where('seccio', 'menuGestio')->findAll();

        $data = $this->data;

        return view('gestio_pag/add', $data);
    }

    public function add()
    {
        // $validation = \Config\Services::validation();
        helper(["form"]);
        // $event = $this->request->getPost('seccio');

        // $rules = [
        //     'nom' => 'required',
        //     'resum' => 'required',
        //     'seccio' => 'required',
        //     'contingut' => 'required'   
        // ];

        // if ($event === 'event') {
        //     unset($rules['contingut']);
        // }

        $data = [
            'nom' => $this->request->getPost('nom'),
            'resum' => $this->request->getPost('resum'),
            'seccio' => $this->request->getPost('seccio'),
            'estat' => $this->request->getPost('estat'),
            'data' => $this->request->getPost('data'),
            'portada' => $this->request->getPost('portada'),
            'contingut' => $this->request->getPost('ckeditor'),
            'url' => mb_url_title($this->request->getPost('nom'), '-', true)
        ];

        // $validation->setRules($rules);

        //  if($this->validate($rules)){
        //     $model = new GestioModel();
        //     $model->insert($data);
        //     return redirect()->to('/gestio');
        // }else {
        //     return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        // } 

        $model = new GestioModel();
        if ($model->insert($data)) {
            return redirect()->to('/gestio');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    // public function gestio()
    // {
    //     // $model = new GestioModel();
    //     // $dataGestio['gestio'] = $model->findAll();
    //     // $dataEvent = new EventsModel();
    //     // $modelEvent['events'] = $dataEvent->findAll();

    //     // $data = [
    //     //     'gestio' => $dataGestio['gestio'],
    //     //     'events' => $modelEvent['events'],
    //     // ];

    //     return view('gestio_pag/SobreNosaltres');
    // }

    public function delete($id)
    {
        $model = new GestioModel();
        $model->delete($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $model = new GestioModel();
        $data['gestio'] = $model->find($id);
        return view('gestio_pag/modify', $data);
    }

    public function update($id)
    {
        helper(["form"]);
        $model = new GestioModel();
        $data = [
            'nom' => $this->request->getPost('nom'),
            'resum' => $this->request->getPost('resum'),
            'seccio' => $this->request->getPost('seccio'),
            'estat' => $this->request->getPost('estat'),
            'contingut' => $this->request->getPost('ckeditor'),
            'url' => mb_url_title($this->request->getPost('nom'), '-', true)
        ];

        if (!$model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            $model->update($id, $data);
            return redirect()->to('/gestio');
        }
    }

    public function historia()
    {
        $model = new GestioModel();
        $data['historia'] = $model->where('seccio', 'historia')->findAll();
        return view('sobreNosaltres', $data);
    }

    // public function addEvent()
    // {
    //     return view('gestio_pag/events/addEvents');
    // }

    // public function addEvent_post()
    // {
    //     helper(["form"]);
    //     $model = new EventsModel();

    //     $date = $this->request->getPost('data');

    //     $data = [
    //         'nom' => $this->request->getPost('nom'),
    //         'data' => $date,
    //         'tipus_event' => $this->request->getPost('tipus_event'),
    //     ];

    //     if (!$model->validate($data)) {
    //         return redirect()->back()->withInput()->with('errors', $model->errors());
    //     } else {
    //         $model->insert($data);
    //         return redirect()->to('/gestio');
    //     }
    // }

    // public function eventsModify($id)
    // {
    //     $model = new EventsModel();
    //     $data['events'] = $model->find($id);
    //     return view('gestio_pag/events/modifyEvent', $data);
    // }

    // public function eventsModify_post($id)
    // {
    //     helper(["form"]);
    //     $model = new EventsModel();

    //     $data = [
    //         'nom' => $this->request->getPost('nom'),
    //         'data' => $this->request->getPost('data'),
    //         'tipus_event' => $this->request->getPost('tipus_event'),
    //     ];

    //     if (!$model->validate($data)) {
    //         return redirect()->back()->withInput()->with('errors', $model->errors());
    //     } else {
    //         $model->update($id, $data);
    //         return redirect()->to('gestio/events');
    //     }
    // }

    // public function eventsDelete($id)
    // {
    //     $model = new EventsModel();
    //     $model->delete($id);
    //     return redirect()->to('gestio/events');
    // }

    public function upload_drag()
    {
        helper(["form"]);

        $model = new AlbumModel();
        $data = [
            'albums' => $model->findAll(),
            'title' => lang('gestioGeneral.uploadTitol')
        ];
        $data['errors'] = [];

        return view('gestio_pag/upload_form_drag', $data);
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
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data['errors'] = $this->validator->getErrors();

            return view('gestio_pag/upload_form_drag', $data);
        }

        if ($imagefile = $this->request->getFiles()) {
            $i = 0;
            $files = [];
            $model = new TaulaFotosModel();

            $proximID = $model->getNextID();

            $carpeta = $this->request->getPost('carpeta');
            $ruta = FCPATH . 'uploads/' . $carpeta;

            if (!is_dir($ruta)) {
                mkdir($ruta, 0777, true);
            }

            $idAlbum = $this->request->getPost('album');

            foreach ($imagefile['userfile'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $i++;

                    $currentDate = date('YmdHis');
                    $ext = $img->getClientExtension();

                    $newName = $currentDate . '_' . $proximID . '.' . $ext;
                    $nom_fitxer = $img->getClientName();
                    $descripcio = $this->request->getPost('descripcio');
                    $carpeta = $this->request->getPost('carpeta');

                    $fotoData = [
                        'titol' => $newName,
                        'nom_fitxer' => $newName,
                        'descripcio' => $descripcio,
                        'ruta' => 'uploads/' . $carpeta . '/' . $newName,
                        'mime_type' => $img->getClientMimeType(),
                    ];

                    if (!empty($idAlbum)) {
                        $fotoData['id_album'] = $idAlbum;
                    }

                    $model->insert($fotoData);

                    $proximID++;

                    $img->move($ruta, $newName);

                    $files[$i] = new File($ruta . '/' . $newName);
                }
            }

            $data['files'] = $files;
            return view('gestio_pag/upload_ok', $data);
        }
    }

    public function crearAlbum()
    {

        return view('gestio_pag/crear_album');
    }

    public function crearAlbum_post()
    {
        helper(["form"]);
        $model = new AlbumModel();

        $data = [
            'titol' => $this->request->getPost('titol'),
            'portada' => $this->request->getPost('portada'),
            'album' => $this->request->getPost('album'),
            'estat' => 'publicat',
        ];

        $validationRule = [
            'titol' => 'required',
            'portada' => 'required',
            'album' => 'required',
            'estat' => 'required|in_list[publicat,no_publicat]',
        ];

        if (!$this->validate($validationRule)) {
            $data['errors'] = $this->validator->getErrors();
            return view('gestio_pag/crear_album', $data);
        }

        $model->insert($data);
        return redirect()->to('/gestio/galeria');
    }

    public function sobreNosaltres()
    {
        $model = new GestioModel();

        $data = [
            'historia' => $model->where('seccio', 'historia')->where('estat', 'publicat')->first(),
            'missio' => $model->where('seccio', 'missio')->where('estat', 'publicat')->first(),
            'visio' => $model->where('seccio', 'visio')->where('estat', 'publicat')->first(),
            'valors' => $model->where('seccio', 'valors')->where('estat', 'publicat')->first(),
        ];

        // $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        // $crud->setTable('gestio');
        // $crud->setPrimaryKey('id');
        // $crud->addWhere('seccio', 'historia');
        // // $crud->addWhere('seccio', 'missio');
        // // $crud->addWhere('seccio', 'visio');
        // // $crud->addWhere('seccio', 'valors');

        // $crud->setColumns(['id', 'nom', 'resum', 'contingut', 'estat']);

        // $crud->setColumnsInfo([
        //     'id' => ['name' => 'codi', 'type' => 'text', 'html_atts' => ["required"],],
        //     'nom' => ['name' => 'nom', 'type' => 'text', 'html_atts' => ["required"],],
        //     'resum' => ['name' => 'resum', 'type' => 'text', 'html_atts' => ["required"],],
        //     'contingut' => ['name' => 'contingut', 'type' => 'textarea', 'html_atts' => ["required"],],
        //     'estat' => ['name' => 'estat',  'type' => 'dropdown', 'html_atts' => ["required"], 'options' => ['publicat' => 'Publicat', 'no_publicat' => 'No publicat'],],
        // ]);

        // // $crud->setConfig('onlyView');
        // // $crud->setConfig(["editable" => true,]);
        // $crud->setConfig('delete', true);
        // $crud->setConfig('add', true);
        // $crud->setConfig('modify', true);

        // $data['output'] = $crud->render();

        return view('gestio_pag/sobreNosaltres', $data);
    }

    public function noticies()
    {

        $model = new GestioModel();
        $noticies = $model->where('seccio', 'noticies')->findAll();
        $pager = $model->pager;

        $data = [
            'noticies' => $noticies,
            'pager' => $pager,
        ];

        return view('gestio_pag/noticies', $data);
    }

    public function events()
    {
        //     $model = new EventsModel();
        //     $events = $model->findAll();
        //     // $tipusEvents = $model->distinct()->select('tipus_event')->findAll();

        //     $pager = $model->pager;

        //     $data = [
        //         'events' => $events,
        //         'pager' => $pager,
        //         // 'tipusEvents' => $tipusEvents,
        //     ];

        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('events');
        $crud->setPrimaryKey('id');
        // $crud->addWhere('seccio', 'historia');

        $crud->setColumns(['id', 'nom', 'data', 'estat']);

        $dataActual = date('Y-m-d H:i:s');

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => 'text', 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => 'text', 'html_atts' => ["required"],],
            'data' => ['name' => 'data', 'type' => 'date', 'default' => $dataActual, 'html_atts' => ["required"],],
            'estat' => ['name' => 'estat',  'type' => 'dropdown', 'html_atts' => ["required"], 'options' => ['publicat' => 'Publicat', 'no_publicat' => 'No publicat'],],
        ]);

        // $crud->setConfig('onlyView');
        $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);

        $data['output'] = $crud->render();

        return view('gestio_pag/events/events', $data);
    }

    // public function menuGestio()
    // {
    //     $model = new ConfiguracioModel();
    //     $data['menuGestio'] = $model->where('seccio', 'menuGestio')->findAll();
    //     return view('gestio_pag/menuGestio', $data);
    // }

    public function album()
    {
        $model = new AlbumModel();
        $data['albums'] = $model->findAll();
        return view('gestio_pag/album', $data);
    }

    public function albumFotos($albumId)
    {
        $albumModel = new AlbumModel();
        $fotoModel = new TaulaFotosModel();

        $data['album'] = $albumModel->find($albumId);
        $data['fotos'] = $fotoModel->where('id_album', $albumId)->findAll();

        return view('gestio_pag/galeria_fotos', $data);
    }

    public function deleteFoto()
    {
        $fotoModel = new TaulaFotosModel();
        $id_foto = $this->request->getVar('id_foto');
        $id_album = $this->request->getVar('id_album');

        if (!empty($id_foto)) {
            $fotoModel->where('id', $id_foto)->delete();
            // $fotoModel->where('id_album',$id_album)->delete($id_foto);
        }

        // return redirect()->to('/gestio/galeria_fotos/' . $id_album);
        return redirect()->back();
    }

    public function eliminarAlbum($id)
    {

        $albumModel = new AlbumModel();
        $fotoModel = new TaulaFotosModel();

        $fotoModel->where('id_album', $id)->delete();
        $albumModel->where('id', $id)->delete();

        return redirect()->to('/gestio/galeria');
    }
}
