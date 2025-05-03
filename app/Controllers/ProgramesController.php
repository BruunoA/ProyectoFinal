<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategoriesModel;


class ProgramesController extends BaseController
{
    protected $categoriesModel;

    public function __construct()
    {
        $this->categoriesModel = new CategoriesModel();
    }

    public function index()
    {
        // Obtener todas las categorías (incluyendo las eliminadas lógicamente si usas soft delete)
        $data['categories'] = $this->categoriesModel->withDeleted()->findAll();
        
        return view('programes', $data);
    }
}
