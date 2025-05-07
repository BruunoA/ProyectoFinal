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

        $id_club = session()->get('id_club');

        // missatge d'error si no hi ha id_club a la sessio
        if (!$id_club) {
            session()->setFlashdata('error', '<div style="background-color: red; color: white; padding: 10px; margin-top: 1rem">' . lang('errors.noSessio') . '</div>');
            return redirect()->to('/');
        }

        $model = new GestioModel();
        $modelEvents = new EventsModel();

        // aga de gestio on seccio = noticies, estat = publicat i el id del club es el mateix que el de la sessio
        $gestio = $model->where('seccio', 'noticies')->where('estat', 'publicat')->where('id_club', $id_club)->paginate(10);
        $pager = $model->pager;


        $data = [
            'gestio' => $gestio,
            'events' => $modelEvents->where('estat', 'publicat')->where('data >=', date('Y-m-d'))->findAll(),
            'pager' => $pager,
        ];

        return view('noticies', $data);
    }

    public function noticia($url)
    {
        $model = new GestioModel();

        $data['noticia'] = $model->where('url', $url)->first();

        // dd($data['noticia']);

        return view('noticiaGran', $data);
    }
}
