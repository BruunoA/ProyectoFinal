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
            'historia' => $model->where('id_seccio', 2)->where('estat', 1)->first(),
            'missio' => $model->where('id_seccio', 3)->where('estat', 1)->first(),
            'visio' => $model->where('id_seccio', 4)->where('estat', 1)->first(),
            'valors' => $model->where('id_seccio', 5)->where('estat', 1)->first(),
        ];
        return view('sobreNosaltres', $data);
    }

    public function sobreNosaltres()
    {
        $model = new GestioModel();

        $data = [
            'historia' => $model->where('id_seccio', 2)->findAll(),
            'missio' => $model->where('id_seccio', 3)->findAll(),
            'visio' => $model->where('id_seccio', 4)->findAll(),
            'valors' => $model->where('id_seccio', 5)->findAll(),
        ];

        return view('gestio_pag/sobreNosaltres', $data);
    }
}
