<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GestioModel;
use App\Models\ClubsModel;
use CodeIgniter\HTTP\ResponseInterface;

class IndexController extends BaseController
{
    public function index()
    {
        $model = new ClubsModel();

        $data = [
            'tags' => $model->findAll(),
        ];

        return view("pagina_inicial", $data);
    }

    public function home()
    {

        // $model = new ClubsModel();
        // $club = $this->request->getGet('club');

        // $id_club = $model->where('nom', $club)->first()['id'];

        // if($id_club){
        //     session()->set('id_club', $id_club);
        // }
        
        $model = new GestioModel();

        $data = [
            'noticies' => $model->where('seccio', 'noticies')->where('destacat', 'si')/*->where('id_club', $id_club)*/->orderBy('created_at', 'desc')->findAll(6),
            'banners' => $model->where('seccio', 'banner')->where('estat', 'publicat')->findAll(4),
            'historia' => $model->where('seccio', 'historia')->where('estat', 'publicat')->first(),
            'missio' => $model->where('seccio', 'missio')->where('estat', 'publicat')->first(),
            'visio' => $model->where('seccio', 'visio')->where('estat', 'publicat')->first(),
            'valors' => $model->where('seccio', 'valors')->where('estat', 'publicat')->first(),
        ];

        // dd($data['banners']);

        return view("home", $data);
    }
}
