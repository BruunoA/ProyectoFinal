<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BannerModel;
use App\Models\GestioModel;
use App\Models\ClubsModel;
use CodeIgniter\HTTP\ResponseInterface;

class IndexController extends BaseController
{

    public function home()
    {

        $modelBanners = new BannerModel();
        
        $model = new GestioModel();

        $data = [
            'noticies' => $model->where('id_seccio', 1)->where('destacat', 1)->orderBy('created_at', 'desc')->findAll(6),
            'missio' => $model->where('id_seccio', 3)->where('estat', 1)->first(),
            'visio' => $model->where('id_seccio', 4)->where('estat', 1)->first(),
            'banners' => $modelBanners->where('tipus', 'banner')->where('destacat', 1)->findAll(3),
        ];

        // dd($data['banners']);

        return view("home", $data);
    }
}
