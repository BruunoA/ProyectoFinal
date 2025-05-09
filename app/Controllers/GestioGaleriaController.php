<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\ClubsModel;
use App\Models\TaulaFotosModel;
use CodeIgniter\HTTP\Exceptions\RedirectException;
use CodeIgniter\HTTP\ResponseInterface;

class GestioGaleriaController extends BaseController
{
    public function album()
    {
        $search = $this->request->getGet('q') ?? '';
        $buscarClub = $this->request->getGet('club') ?? '';

        $model = new AlbumModel();
        $modelClubs = new ClubsModel();
        $clubs = $modelClubs->findAll();

        if ($search !== '') {
            $albums = $model->like('titol', $search)->orderBy('created_at', 'DESC')->paginate(6);
        } else {
            $albums = $model->orderBy('created_at', 'DESC')->paginate(6);
        }

        if ($buscarClub !== '') {
            $albums = $model->where('id_club', $buscarClub)->orderBy('created_at', 'DESC')->paginate(6);
        }

        $pager = $model->pager;

        $data = [
            'albums' => $albums,
            'clubs' => $clubs,
            'pager' => $pager,
            'search' => $search,
        ];

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
        }

        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Imatge esborrada correctament</div>');
        return redirect()->back();
    }

    public function eliminarAlbum($id)
    {

        $albumModel = new AlbumModel();
        $fotoModel = new TaulaFotosModel();

        $fotoModel->where('id_album', $id)->delete();
        $albumModel->where('id', $id)->delete();

        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Album esborrat correctament</div>');
        return redirect()->to('/gestio/galeria');
    }

    public function crearAlbum()
    {
        $model = new ClubsModel();
        $club = $model->findAll();

        $data = [
            'clubs' => $club,
        ];

        return view('gestio_pag/fotos/crear_album', $data);
    }

    public function crearAlbum_post()
    {
        helper(["form"]);
        $model = new AlbumModel();

        $validationRule = [
            'titol' => [
                'label' => 'Títol',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Títol és obligatori.',
                ],
            ],
            'portada' => [
                'label' => 'Portada',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Portada és obligatori.',
                ],
            ],
            'club' => [
                'label' => 'Club',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Club és obligatori.',
                ],
            ],
            'estat' => [
                'label' => 'Estat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Estat és obligatori.',
                ],
            ]
        ];

        $data = [
            'titol' => $this->request->getPost('titol'),
            'portada' => $this->request->getPost('portada'),
            'id_club' => $this->request->getPost('club'),
            'estat' => $this->request->getPost('estat'),
        ];

        if (!$this->validate($validationRule)) {
            $data['errors'] = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $data['errors']);
        }

        $model->insert($data);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Album creat correctament</div>');
        return redirect()->to('/gestio/galeria');
    }

    public function modify($id)
    {
        $model = new AlbumModel();
        $clubs = new ClubsModel();
        $club = $clubs->findAll();
        $album = $model->find($id);

        $data = [
            'album' => $album,
            'clubs' => $club,
        ];

        return view('gestio_pag/fotos/modify_album', $data);
    }

    public function modify_post($id)
    {
        $model = new AlbumModel();

        $validationRule = [
            'titol' => [
                'label' => 'Títol',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Títol és obligatori.',
                ],
            ],
            'portada' => [
                'label' => 'Portada',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Portada és obligatori.',
                ],
            ],
            'club' => [
                'label' => 'Club',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Club és obligatori.',
                ],
            ],
            'estat' => [
                'label' => 'Estat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp Estat és obligatori.',
                ],
            ]
        ];

        $data = [
            'id' => $id,
            'titol' => $this->request->getPost('titol'),
            'portada' => $this->request->getPost('portada'),
            'id_club' => $this->request->getPost('club'),
            'estat' => $this->request->getPost('estat'),
        ];

        // dd($data);

        if (!$this->validate($validationRule)) {
            $data['errors'] = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('errors', $data['errors']);
        }

        $model->save($data);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Album modificat correctament</div>');
        return redirect()->to('/gestio/galeria');
    }
}
