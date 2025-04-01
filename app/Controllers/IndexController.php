<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class IndexController extends BaseController
{
    public function home()
    {
        
        return view("home");
    }

    public function index()
    {
        return view("inici");
    }

    public function equipo2(){
        return view("equipo2");
    }

    public function equipo3(){
        return view("equipo3");
    }
}
