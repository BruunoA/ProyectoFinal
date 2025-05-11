<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClubsModel;
use App\Models\EventsModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;

class NoticiesController extends BaseController
{

    public function index()
    {

        $model = new GestioModel();
        $modelEvents = new EventsModel();

        // agafa totes les noticies on el seu estat es 1 (publicat)
        $gestio = $model->where('seccio', 'noticies')->where('estat', 1)->paginate(6);
        $pager = $model->pager;

        $data = [
            'gestio' => $gestio,
            // agafem solament els events on la data de event sigui mes gran o igual a la data actual
            'events' => $modelEvents->where('estat', 1)->where('data >=', date('Y-m-d'))->findAll(),
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
    
    public function noticies()
    {
        $search = $this->request->getGet('q') ?? '';
        $buscarClub = $this->request->getGet('club') ?? '';

        $model = new GestioModel();

        $modelClubs = new ClubsModel();
        $clubs = $modelClubs->findAll();

        if ($search == '') {
            $noticies = $model->where('seccio', 'noticies')->orderBy('created_at', 'DESC')->paginate(6);
        } else {
            $noticies = $model->where('seccio', 'noticies')->like('nom', $search)->orLike('contingut', $search)->orderBy('created_at', 'DESC')->paginate(6);
        }

        if ($buscarClub !== '') {
            $noticies = $model->where('seccio', 'noticies')->where('id_club', $buscarClub)->orderBy('created_at', 'DESC')->paginate(6);
        }

        $pager = $model->pager;

        $data = [
            'noticies' => $noticies,
            'clubs' => $clubs,
            'pager' => $pager,
            'search' => $search,
        ];

        return view('gestio_pag/noticies', $data);
    }
}
