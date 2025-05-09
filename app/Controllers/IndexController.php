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
            'noticies' => $model->where('seccio', 'noticies')->where('destacat', 1)->orderBy('created_at', 'desc')->findAll(6),
            'banners' => $model->where('seccio', 'banner')->where('estat', 1)->findAll(4),
            'missio' => $model->where('seccio', 'missio')->where('estat', 1)->first(),
            'visio' => $model->where('seccio', 'visio')->where('estat', 1)->first(),
            'banners' => $modelBanners->where('seccio', 'banner')->where('estat', 1)->findAll(3),
        ];

        // dd($data['banners']);

        return view("home", $data);
    }
}
