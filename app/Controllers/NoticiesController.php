<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class NoticiesController extends BaseController
{
    public function index()
    {
        return view('noticies');
    }
}
