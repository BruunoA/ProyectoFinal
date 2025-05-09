<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GestioModel;
use App\Models\ClubsModel;
use CodeIgniter\HTTP\ResponseInterface;

class IndexController extends BaseController
{

    public function home()
    {

        $modelBanners = new GestioModel();
        
        $model = new GestioModel();

        $data = [
            'noticies' => $model->where('seccio', 'noticies')->where('destacat', 'si')->orderBy('created_at', 'desc')->findAll(6),
            'banners' => $model->where('seccio', 'banner')->where('estat', 'publicat')->findAll(4),
            'missio' => $model->where('seccio', 'missio')->where('estat', 'publicat')->first(),
            'visio' => $model->where('seccio', 'visio')->where('estat', 'publicat')->first(),
            'banners' => $modelBanners->where('seccio', 'banner')->where('estat', 'publicat')->findAll(3),
        ];

        // dd($data['banners']);

        return view("home", $data);
    }
}
