<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventsModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;

class NoticiesController extends BaseController
{
    public function index()
    {
        $model = new GestioModel();
        $modelEvents = new EventsModel();

        $data = [
            'gestio' => $model->where('seccio', 'noticies')->where('estat', 'publicat')->findAll(),
            'events' => $modelEvents->where('estat', 'publicat')->findAll(),
        ];
        return view('noticies', $data);
    }
    
    public function noticia($id)
    {
        $model = new GestioModel();

        $data['noticia'] = $model->find($id);
        $data['titol'] = $data['noticia']['nom'];
        
        return view('noticiaGran', $data);
    }
}
