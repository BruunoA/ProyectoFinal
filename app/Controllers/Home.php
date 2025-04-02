<?php

namespace App\Controllers;
use App\Models\BannerModel;

class Home extends BaseController
{
    public function index(): string
    {

        $bannerModel = new BannerModel();
        $banners['img'] = $bannerModel->findAll();
        return view('pagina_inicial');
    }
}
