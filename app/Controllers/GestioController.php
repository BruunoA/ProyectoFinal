<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\ConfiguracioModel;
use App\Models\EventsModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;
use App\Models\MenuModel;
use App\Models\ClubsModel;
use App\Models\TaulaFotosModel;
use CodeIgniter\Files\File;
use Config\App;
use SIENSIS\KpaCrud\Config\KpaCrud;
use App\Models\ContacteModel;

class GestioController extends BaseController
{
    public function index()
    {
        // $model = new ConfiguracioModel();
        // $data['menuGestio'] = $model->where('seccio', 'menuGestio')->findAll();

        // $data = $this->data;

        $model = new ClubsModel();

        $data = [
            'clubs' => $model->findAll(),
        ];

        return view('gestio_pag/add', $data);
    }

    public function add()
    {
        $validation = \Config\Services::validation();

        helper(["form"]);

        $seccio = $this->request->getPost('seccio');

        $rules = [
            'nom' => 'required',
            'resum' => 'required',
            'seccio' => 'required',
            'id_club' => 'required',
            'estat' => 'required',
            'ckeditor' => 'required',
        ];

        if ($seccio === 'noticies') {
            $rules['portada'] = 'required';
        }

        $data = [
            'nom' => $this->request->getPost('nom'),
            'resum' => $this->request->getPost('resum'),
            'seccio' => $this->request->getPost('seccio'),
            'id_club' => $this->request->getPost('id_club'),
            'estat' => $this->request->getPost('estat'),
            'data' => $this->request->getPost('data'),
            'portada' => $this->request->getPost('portada'),
            'contingut' => $this->request->getPost('ckeditor'),
            'url' => mb_url_title($this->request->getPost('nom'), '-', true)
        ];

        // $validation->setRules($rules);

        if ($this->validate($rules)) {
            $model = new GestioModel();
            $model->insert($data);
            return redirect()->to('/gestio');
        } else {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // $model = new GestioModel();
        // if ($model->insert($data)) {
        //     return redirect()->to('/gestio');
        // } else {
        //     return redirect()->back()->withInput()->with('errors', $model->errors());
        // }
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
        $data['gestio'] = $model->find($id);
        return view('gestio_pag/modify', $data);
    }

    public function update($id)
    {
        helper(["form"]);
        $model = new GestioModel();
        $data = [
            'id'  => $id,
            'nom' => $this->request->getPost('nom'),
            'portada' => $this->request->getPost('portada'),
            'resum' => $this->request->getPost('resum'),
            'seccio' => $this->request->getPost('seccio'),
            'estat' => $this->request->getPost('estat'),
            'contingut' => $this->request->getPost('ckeditor'),
            'url' => mb_url_title($this->request->getPost('nom'), '-', true)
        ];

        if (!$model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            $model->save($data);
            return redirect()->to('/gestio');
        }
    }

    public function historia()
    {
        $model = new GestioModel();
        $data['historia'] = $model->where('seccio', 'historia')->findAll();
        return view('sobreNosaltres', $data);
    }

    public function upload_drag()
    {
        helper(["form"]);

        $model = new AlbumModel();
        $data = [
            'albums' => $model->findAll(),
            'title' => lang('gestioGeneral.uploadTitol')
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

            // agafar el proxim id
            $proximID = $model->getNextID();

            // nom de la carpeta a crear, on es guardara la imatge
            $carpeta = $this->request->getPost('album');
            $ruta = FCPATH . 'uploads/' . $carpeta;

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
                    $nom_fitxer = $img->getClientName();
                    $descripcio = $this->request->getPost('descripcio');

                    $fotoData = [
                        'titol' => $newName,
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

    public function crearAlbum()
    {

        return view('gestio_pag/fotos/crear_album');
    }

    public function crearAlbum_post()
    {
        helper(["form"]);
        $model = new AlbumModel();

        $portada = $this->request->getFile('portada');
        $titolPortada = $this->request->getPost('titol');

        if ($portada) {
            $newName = $titolPortada;
            $portada->move(FCPATH . 'uploads/portades', $newName);
            $data['portada'] = 'uploads/portades/' . $newName;
        } else {
            $data['portada'] = 'http://localhost/fileget/album.jpg';
        }

        $data = [
            'titol' => $this->request->getPost('titol'),
            'portada' => $this->request->getPost('portada'),
            'album' => $this->request->getPost('album'),
            'estat' => $this->request->getPost('estat'),
        ];

        $validationRule = [
            'titol' => 'required',
            // 'portada' => 'required',
            'album' => 'required',
            'estat' => 'required|in_list[publicat,no_publicat]',
        ];

        // if (!$this->validate($validationRule)) {
        //     $data['errors'] = $this->validator->getErrors();
        //     return view('gestio_pag/crear_album', $data);
        // }

        $model->insert($data);
        return redirect()->to('/gestio/galeria');
    }

    public function sobreNosaltres()
    {
        $model = new GestioModel();

        $data = [
            'historia' => $model->where('seccio', 'historia')->findAll(),
            'missio' => $model->where('seccio', 'missio')->findAll(),
            'visio' => $model->where('seccio', 'visio')->findAll(),
            'valors' => $model->where('seccio', 'valors')->findAll(),
        ];

        return view('gestio_pag/sobreNosaltres', $data);
    }

    public function noticies()
    {

        $model = new GestioModel();
        // $noticies = $model->where('seccio', 'noticies')->findAll();
        $noticies = $model->where('seccio', 'noticies')->orderBy('created_at', 'DESC')->paginate(6);

        $pager = $model->pager;

        $data = [
            'noticies' => $noticies,
            'pager' => $pager,
        ];

        return view('gestio_pag/noticies', $data);
    }

    public function events()
    {
        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('events');
        $crud->setPrimaryKey('id');

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

    public function album()
    {
        $model = new AlbumModel();
        $data['albums'] = $model->findAll();
        return view('gestio_pag/fotos/album', $data);
    }

    public function albumFotos($albumId)
    {
        $albumModel = new AlbumModel();
        $fotoModel = new TaulaFotosModel();

        $data['album'] = $albumModel->find($albumId);
        $data['fotos'] = $fotoModel->where('id_album', $albumId)->findAll();

        return view('gestio_pag/fotos/galeria_fotos', $data);
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

    public function banner(){

        $model = new TaulaFotosModel();

        $data =[
            'banner' => $model->where('banner', 'si')->findAll(),
        ];

        return view('gestio_pag/banner/banner', $data);
    }

    public function bannerDelete($id){

        $model = new TaulaFotosModel();
        $model->where('id', $id)->delete();

        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Banner esborrat correctament</div>');
        return redirect()->to('/gestio/banner');
    }

    public function bannerModify($id){

        $model = new TaulaFotosModel();
        $data['banner'] = $model->find($id);

        return view('gestio_pag/banner/banner_modify', $data);
    }

    public function bannerModify_post($id){

        helper(["form"]);

        $validationRule = [
            'titol' => 'required',
            'descripcio' => 'required',
            'ruta' => 'required',
        ];

        $model = new TaulaFotosModel();
        $data = [
            'id' => $id,
            'titol' => $this->request->getPost('titol'),
            'descripcio' => $this->request->getPost('descripcio'),
            'ruta' => $this->request->getPost('ruta'),
        ];

        if ($model->save($data)) {
            session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Banner modificat correctament</div>');
            return redirect()->to('/gestio/banner');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function mail() {
        $contacteModel = new ContacteModel();
        $data['contactes'] = $contacteModel->findAll(); 
        
        return view('gestio_pag/Email', $data); 
    }

}
