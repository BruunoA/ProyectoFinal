<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SobrenosaltresController extends BaseController
{
    public function index()
    {
        return view('sobrenosaltres');
    }
}
