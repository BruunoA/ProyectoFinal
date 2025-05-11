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

        $search = $this->request->getGet('q') ?? '';
        $buscarClub = $this->request->getGet('club') ?? '';

        $model = new GestioModel();
        $modelEvents = new EventsModel();
        $modelClubs = new ClubsModel();

        // consulta base per a després poder filtrar, si fos necessari
        $base = $model->where('seccio', 'noticies')->orderBy('created_at', 'DESC');

        // si hi ha un filtre de cerca, s'aplica
        if($search !== '') {
            $base->like('nom', $search)->orLike('contingut', $search);
        }

        // si hi ha un filtre de club, s'aplica
        if($buscarClub !== '') {
            $base->where('id_club', $buscarClub);
        }

        // consulta final, aplicant filtre de que agafi sol els que tenen estat publicat
        $gestio = $base->where('estat', 1)->paginate(6);

        $pager = $model->pager;

        $data = [
            'gestio' => $gestio,
            // agafem solament els events on la data de event sigui mes gran o igual a la data actual
            'events' => $modelEvents->where('estat', 1)->where('data >=', date('Y-m-d'))->findAll(),
            'pager' => $pager,
            'search' => $search,
            'clubs' => $modelClubs->findAll(),
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

        // consulta base per a després poder filtrar, si fos necessari
        $selectBase = $model->where('seccio', 'noticies')->orderBy('created_at', 'DESC');

        // si hi ha un filtre de cerca, s'aplica
        if($search !== '') {
            $selectBase->like('nom', $search)->orLike('contingut', $search);
        }

        // si hi ha un filtre de club, s'aplica
        if($buscarClub !== '') {
            $selectBase->where('id_club', $buscarClub);
        }

        // consulta final
        $noticies = $selectBase->paginate(6);

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
