<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\FotosModel;

class GaleriaController extends BaseController
{
    public function index()
    {
        return view('galeria');
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
        
        return view('galeria', $data);
    }
}
