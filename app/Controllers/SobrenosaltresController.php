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
            'historia' => $model->where('seccio', 'historia')->where('estat', 'publicat')->first(),
            'missio' => $model->where('seccio', 'missio')->where('estat', 'publicat')->first(),
            'visio' => $model->where('seccio', 'visio')->where('estat', 'publicat')->first(),
            'valors' => $model->where('seccio', 'valors')->where('estat', 'publicat')->first(),
        ];
        return view('sobreNosaltres', $data);
    }

}
