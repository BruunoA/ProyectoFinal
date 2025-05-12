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
            'noticies' => $model->where('id_seccio', 1)->where('destacat', 1)->orderBy('created_at', 'desc')->findAll(6),
            // 'banners' => $model->where('seccio', 6)->where('estat', 1)->findAll(4),
            'missio' => $model->where('id_seccio', 3)->where('estat', 1)->first(),
            'visio' => $model->where('id_seccio', 4)->where('estat', 1)->first(),
            'banners' => $modelBanners->where('id_seccio', 6)->where('estat', 1)->findAll(3),
        ];

        // dd($data['banners']);

        return view("home", $data);
    }
}
