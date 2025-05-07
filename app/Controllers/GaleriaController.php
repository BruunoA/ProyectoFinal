<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FotosModel;

class GaleriaController extends BaseController
{
    public function index()
    {
        return view('galeriaFotos/galeria');
    }

    public function getFotos()
    {

        // $search = $this->request->getGet('q');
        $fotosModel = new FotosModel();
        $id_club = session()->get('id_club');

        // missatge d'error si no hi ha id_club a la sessio
        if (!$id_club) {
            session()->setFlashdata('error', '<div style="background-color: red; color: white; padding: 10px; margin-top: 1rem">' . lang('errors.noSessio') . '</div>');
            return redirect()->to('/');
        }

        // inner join per a agafar solament les fotos que tenen un album amb le id del club


        // if($search !== '') {
        // $fotosModel->like('taula_fotos.titol', $search)->orLike('taula_fotos.descripcio', $search);
        // }

        $model = new AlbumModel();
        $albumsInfo = $model->where('estat', 'publicat')->findAll(); // agafa els albums publicats

        $pager = $fotosModel->pager;

        // agafa totes les fotos 
        $fotos = $fotosModel->join('albums', 'taula_fotos.id_album = albums.id')->where('albums.id_club', $id_club)->findAll();
        
        $albums = [];
        foreach ($fotos as $foto) {
            $albumId = $foto['id_album'];   // agafa l'id de l'album de la foto

            foreach ($albumsInfo as $album) {
                if ($album['id'] == $albumId) {  // mira si l'id de l'album de la foto es el mateix que l'id de l'album publicat
                    $albumTitle = $album['titol']; // agafa el titol de l'album 
                    // break;
                }
            }

            if (!isset($albums[$albumId])) {    // si no existeix l'album, el crea
                $albums[$albumId] = [   // crea un array amb l'id de l'album, el titol, un count i un array per a les fotos
                    'titol' => $albumTitle,
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
            // 'search' => $search,
        ];

        return view('galeriaFotos/galeria', $data);
    }

    public function getAlbumFotos($albumId)
    {
        $fotosModel = new FotosModel();
        $fotos = $fotosModel->where('id_album', $albumId)->findAll();

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
}
