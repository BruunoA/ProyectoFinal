<?php

namespace App\Controllers;
use App\Models\BannerModel;

class Home extends BaseController
{

    public function index(): string
    {

        return view('welcome_message');
    }

    // public function menu(){
    //     return view('general/menu', $this->data);
    // }

    // public function cambiar($lang)
    // {
    //     $session = session();
    //     $session->set('language', $lang);
    //     echo "Idioma es: " . $lang;
    //     return redirect()->back();
    // }
}
