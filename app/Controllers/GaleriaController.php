<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class GaleriaController extends BaseController
{
    public function index()
    {
        return view('galeria');
    }
}
