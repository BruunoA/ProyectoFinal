<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function cambiar($lang = 'es')
    {
        $session = session();
        $session->set('lang', $lang);

        return redirect()->back();
    }
}
