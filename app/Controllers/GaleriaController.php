<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FotosModel;
use App\Models\ClubsModel;
use App\Models\TaulaFotosModel;

class GaleriaController extends BaseController
{
    public function index()
    {
        return view('galeriaFotos/galeria');
    }

    public function getFotos()
    {

        $fotosModel = new FotosModel();

        $model = new AlbumModel();
        $albumsInfo = $model->where('estat', 1)->findAll(); // agafa els albums publicats

        $albumMap = [];     // array per a guardar els albums publicats
        foreach ($albumsInfo as $album) {
            $albumMap[$album['id']] = [
                'titol' =>$album['titol'],  // guardem el titol de l'album
                'portada' => $album['portada'], // guardem la portada de l'album
            ];
        }

        // inner join per a agafar solament les fotos que tenen un album amb le id del club
        $fotos = $fotosModel->join('albums', 'taula_fotos.id_album = albums.id')->findAll();

        $pager = $fotosModel->pager;

        $albums = [];
        foreach ($fotos as $foto) {
            $albumId = $foto['id_album'];   // agafa l'id de l'album de la foto

            if (!isset($albumMap[$albumId])) { // si l'album no es publicat, el salta
                continue;
            }

            if (!isset($albums[$albumId])) {    // si no existeix l'album, el crea
                $albums[$albumId] = [   // crea un array amb l'id de l'album, el titol, un count i un array per a les fotos
                    'titol' => $albumMap[$albumId]['titol'],
                    'portada' => $albumMap[$albumId]['portada'],
                    'count' => 0,
                    'fotos' => []
                ];
            }

            $albums[$albumId]['count']++;   // incrementa el count de l'album
            $albums[$albumId]['fotos'][] = $foto;  // afegeix la foto a l'array de fotos de l'album
        }

        $data = [
            'albums' => $albums,
            'totalFotos' => count($fotos),
        ];

        return view('galeriaFotos/galeria', $data);
    }

    public function getAlbumFotos($albumId)
    {
        $fotosModel = new FotosModel();
        $fotos = $fotosModel->where('id_album', $albumId)->where('estat', 1)->findAll();

        if (empty($fotos)) {
            return redirect()->to('/galeria')->with('error', lang('errors.noAlbum'));
        }

        $data = [
            'album' => [
                'id' => $albumId,
                'titol' => $fotos[0]['titulo_album'] ?? 'Álbum ' . $albumId,
                'fotos' => $fotos
            ]
        ];

        return view('galeriaFotos/fotosAlbum', $data);
    }

    public function album()
    {
        $search = $this->request->getGet('q') ?? '';
        $buscarClub = $this->request->getGet('club') ?? '';

        $model = new AlbumModel();
        $modelClubs = new ClubsModel();
        $clubs = $modelClubs->findAll();

        // consulta base per a després poder filtrar, si fos necessari
        $base = $model->orderBy('created_at', 'DESC');

        // si hi ha un filtre de cerca, s'aplica
        if ($search !== '') {
            $base->like('titol', $search);
        }

        // si hi ha un filtre de club, s'aplica
        if ($buscarClub !== '') {
            $base->where('id_club', $buscarClub);
        }

        // consulta final
        $albums = $base->paginate(6);

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

    public function deleteFoto($id)
    {
        $fotoModel = new TaulaFotosModel();

        if (!empty($id)) {
            $fotoModel->delete($id);
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
                    'required' => 'El camp títol és obligatori.',
                ],
            ],
            'portada' => [
                'label' => 'Portada',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp portada és obligatori.',
                ],
            ],
            'club' => [
                'label' => 'Club',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp club és obligatori.',
                ],
            ],
            'estat' => [
                'label' => 'Estat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp estat és obligatori.',
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
            return redirect()->back()->withInput();
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
                    'required' => 'El camp títol és obligatori.',
                ],
            ],
            'portada' => [
                'label' => 'Portada',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp portada és obligatori.',
                ],
            ],
            'club' => [
                'label' => 'Club',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp club és obligatori.',
                ],
            ],
            'estat' => [
                'label' => 'Estat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El camp estat és obligatori.',
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
            return redirect()->back()->withInput();
        }

        $model->save($data);
        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Album modificat correctament</div>');
        return redirect()->to('/gestio/galeria');
    }

    public function EditFoto($id)
    {
        $fotoModel = new TaulaFotosModel();
        $foto = $fotoModel->find($id);

        if (!$foto) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Foto no trobada');
        }

        $data = [
            'foto' => $foto,
        ];

        return view('gestio_pag/fotos/edit_foto', $data);
    }

    public function EditFoto_post($id)
    {
        $fotoModel = new TaulaFotosModel();

        $validationRule = [
            'titol' => [
                'label' => 'Títol',
                'rules' => 'required',
                'errors' => [
                    'required' => lang('errors.titolObligatori'),
                ],
            ],
        ];

        $data = [
            'id' => $id,
            'titol' => $this->request->getPost('titol'),
            'descripcio' => $this->request->getPost('descripcio'),
        ];

        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput();
        }

        $fotoModel->save($data);
        $fotoActualizada = $fotoModel->find($id);
        return view('gestio_pag/fotos/edit_foto', [
            'foto' => $fotoActualizada,
            'success' => '<div style="background-color: green; color: white; padding: 10px;">Imatge modificada correctament</div>'
        ]);
    }

    public function cambiarEstatFoto()
    {
        $idFoto = $this->request->getPost('id_foto');
        $estatFoto = $this->request->getPost('estat');
        $idAlbum = $this->request->getPost('id_album');


        if ($estatFoto === 'publicat') {
            $estatNou = 1;
        } elseif ($estatFoto === 'no_publicat') {
            $estatNou = 0;
        } else {
            return redirect()->back()->with('error', 'Estat no vàlid');
        }

        if (empty($idFoto) || empty($estatFoto) || empty($idAlbum)) {
            return redirect()->back()->with('error', 'Error, falten dades per a modificar l\'estat');
        }

        $fotoModel = new TaulaFotosModel();
        $actualitzar = $fotoModel->update($idFoto, [
            'estat' => $estatNou,
        ]);

        if (!$actualitzar) {
            return redirect()->back()->with('error', 'No s\'ha pogut actualitzar l\'estat');
        }

        return redirect()->to("/gestio/galeria_fotos/$idAlbum")->with('success', '<div style="background-color: green; color: white; padding: 10px;">Estat actualitzat correctament</div>');
    }
}
