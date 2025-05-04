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

        $id_club = $this->request->getGet('id_club');

        if($id_club){
            session()->set('id_club', $id_club);
        }
        
        $model = new GestioModel();

        $data = [
            'noticies' => $model->where('seccio', 'noticies')->where('destacat', 'si')->where('id_club', $id_club)->orderBy('created_at', 'desc')->findAll(),
        ];

        return view("home", $data);
    }

    public function equipo2(){
        return view("equipo2");
    }

    public function equipo3(){
        return view("equipo3");
    }
}
