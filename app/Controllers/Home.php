<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function cambiar($lang = 'ca')
    {
        $session = session();
        $session->set('lang', $lang);
        echo "Idioma es: " . $lang;
        // die;
        return redirect()->back();
    }
}
