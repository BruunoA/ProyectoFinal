<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GestioModel;

class SobreNosaltresController extends BaseController
{
    public function index()
    {
        $model = new GestioModel();
        $data = [
            'missio' => $model->where('seccio', 'missio')->first(),
            'visio' => $model->where('seccio', 'visio')->first(),
            'valors' => $model->where('seccio', 'valors')->first(),
        ];
        return view('sobreNosaltres', $data);
    }

}
