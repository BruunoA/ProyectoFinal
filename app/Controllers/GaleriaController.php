<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FotosModel;

class GaleriaController extends BaseController
{
    public function index()
    {
        return view('galeriaFotos/galeria');
    }

    public function getFotos(){

        $fotosModel = new FotosModel();
        $fotos = $fotosModel->findAll();
        
        $albums = [];
        foreach ($fotos as $foto) {
            $albumId = $foto['id_album'];
            
            if (!isset($albums[$albumId])) {
                $albums[$albumId] = [
                    'count' => 0,
                    'fotos' => []
                ];
            }
            
            $albums[$albumId]['count']++;
            $albums[$albumId]['fotos'][] = $foto;
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
        $fotos = $fotosModel->where('id_album', $albumId)->findAll();
        
        if (empty($fotos)) {
            return redirect()->to('/galeria')->with('error', 'Álbum no encontrado');
        }
        
        $data = [
            'album' => [
                'id' => $albumId,
                'titol' => $fotos[0]['titulo_album'] ?? 'Álbum '.$albumId,
                'fotos' => $fotos
            ]
        ];
        
        return view('galeriaFotos/fotosAlbum', $data);
    }

    // public function getFotos(){

    //     $fotosModel = new FotosModel();
    //     $fotos = $fotosModel->findAll();
        
    //     $albums = [];
    //     foreach ($fotos as $foto) {
    //         $albumId = $foto['id_album'];
            
    //         if (!isset($albums[$albumId])) {
    //             $albums[$albumId] = [
    //                 'count' => 0,
    //                 'fotos' => []
    //             ];
    //         }
            
    //         $albums[$albumId]['count']++;
    //         $albums[$albumId]['fotos'][] = $foto;
    //     }
        
    //     $data = [
    //         'albums' => $albums,
    //         'totalFotos' => count($fotos),
    //     ];
        
    //     return view('galeria', $data);
    // }
}
