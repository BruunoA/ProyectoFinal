<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventsModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;

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
        return redirect()->to('/gestio');
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
        $horaActual = date('H:i:s');
        $dataCompleta = $date . ' ' . $horaActual;

        $data = [
            'nom' => $this->request->getPost('nom'),
            'data' => $dataCompleta,
            'tipus_event' => $this->request->getPost('tipus_event'),
        ];

        // var_dump($date);
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
            foreach ($imagefile['userfile'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $i++;

                    $newName = $img->getClientName();
                    $img->move(WRITEPATH . 'uploads', $newName);

                    $files[$i] = new File(WRITEPATH . 'uploads/' . $newName);
                }
            }

            $data['files'] = $files;
            return view('gestio_pag/upload_ok', $data);
        }
    }
}
