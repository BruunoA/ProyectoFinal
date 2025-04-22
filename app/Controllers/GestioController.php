<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracioModel;
use App\Models\EventsModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;
use App\Models\MenuModel;
use App\Models\TaulaFotosModel;
use CodeIgniter\Files\File;


class GestioController extends BaseController
{
    public function index()
    {
        return view('gestio_pag/add');
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

    public function gestio()
    {
        $model = new GestioModel();
        $dataGestio['gestio'] = $model->findAll();
        $dataEvent = new EventsModel();
        $modelEvent['events'] = $dataEvent->findAll();

        $data = [
            'gestio' => $dataGestio['gestio'],
            'events' => $modelEvent['events'],
        ];

        return view('gestio_pag/gestio', $data);
    }

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

    public function addEvent()
    {
        return view('gestio_pag/addEvents');
    }

    public function addEvent_post()
    {
        helper(["form"]);
        $model = new EventsModel();

        $date = $this->request->getPost('data');

        $data = [
            'nom' => $this->request->getPost('nom'),
            'data' => $date,
            'tipus_event' => $this->request->getPost('tipus_event'),
        ];

        // echo $date;
        // die;

        if (!$model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            $model->insert($data);
            return redirect()->to('/gestio');
        }
    }

    public function upload_drag()
    {
        helper(["form"]);

        $data['title'] = "Multiple file uploader drag drop";
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
                    . '|max_size[userfile,100]'
                    . '|max_dims[userfile,1024,768]',
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
            foreach ($imagefile['userfile'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $i++;
                    // Afegit
                    $currentDate = date('YmdHis');
                    $ext = $img->getClientExtension();

                    // Crear el nuevo nombre: fecha_id.extensión
                    $newName = $currentDate . '_' . $proximID . '.' . $ext;
                    $nom_fitxer = $img->getClientName();

                    // Mover el archivo
                    // $img->move(WRITEPATH . 'uploads', $newName);
                    $descripcio = $this->request->getPost('descripcio');
                    $carpeta = $this->request->getPost('carpeta');

                    $fotoData = [
                        'titol' => $newName,
                        'nom_fitxer' => $newName,
                        'descripcio' => $descripcio,
                        'ruta' => 'writable/uploads/' . $nom_fitxer,
                        'mime_type' => $img->getClientMimeType()
                    ];

                    $model->insert($fotoData);

                    $proximID++;

                    $newName = $img->getClientName();
                    $img->move(WRITEPATH . 'uploads', $newName);

                    $files[$i] = new File(WRITEPATH . 'uploads/' . $newName);
                }
            }

            $data['files'] = $files;
            return view('gestio_pag/upload_ok', $data);
        }
    }

    public function menu(){
        
        $model = new MenuModel();

        $data['menu'] = $model->findAll();
        return view('config_pag/menu', $data);
    }

    public function menuModify($id)
    {
        $model = new MenuModel();
        $data['menu'] = $model->find($id);
        return view('config_pag/menuModify', $data);
    }

    public function menuModify_post($id)
    {
        $model = new MenuModel();
        $data = [
            'nom' => $this->request->getPost('nom'),
            'enllaç' => $this->request->getPost('enllaç'),
            'id_pare' => $this->request->getPost('id_pare'),
            'visibilitat' => $this->request->getPost('visibilitat'),
            'ordre' => $this->request->getPost('ordre')
        ];

        if (!$model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            $model->update($id, $data);
            return redirect()->to('/gestio/menu');
        }
    }

    public function menuDelete($id)
    {
        $model = new MenuModel();
        $model->delete($id);
        return redirect()->to('/gestio/menu');
    }

    public function menuAdd()
    {
        return view('config_pag/menuAdd');
    }

    public function menuAdd_post()
    {
        $model = new MenuModel();
        $data = [
            'nom' => $this->request->getPost('nom'),
            'enllaç' => $this->request->getPost('enllaç'),
            'id_pare' => $this->request->getPost('id_pare'),
            'visibilitat' => $this->request->getPost('visibilitat'),
            'ordre' => $this->request->getPost('ordre')
        ];

        if (!$model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            $model->insert($data);
            return redirect()->to('/gestio/menu');
        }
    }

    public function sobreNosaltres(){
        $model = new GestioModel();
        $data['historia'] = $model->where('seccio', 'historia')->where('estat', 'publicat')->first();
        $data['missio'] = $model->where('seccio', 'missio')->where('estat', 'publicat')->first();
        $data['visio'] = $model->where('seccio', 'visio')->where('estat', 'publicat')->first();
        $data['valors'] = $model->where('seccio', 'valors')->where('estat', 'publicat')->first();

        return view('gestio_pag/sobreNosaltres', $data);
    }

    public function noticies(){

        $model = new GestioModel();
        $noticies = $model->where('seccio', 'noticies')->findAll();

        $data = [
            'noticies' => $noticies,
        ];

        return view('gestio_pag/noticies', $data);
    }

    public function events(){
        $model = new EventsModel();
        $events = $model->findAll();

        $pager = $model->pager;

        $data = [
            'events' => $events,
            'pager' => $pager,
        ];

        return view('gestio_pag/events', $data);
    }

    public function menuGestio(){
        $model = new ConfiguracioModel();
        $data['menuGestio'] = $model->where('seccio', 'menuGestio')->findAll();
        return view('gestio_pag/menuGestio', $data);
    }
}
