<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ContacteController extends BaseController
{
    public function index()
    {
        return view('contacte');
    }
}
