<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracioModel;
use CodeIgniter\HTTP\ResponseInterface;

class ConfiguracioController extends BaseController
{
    public function dades_contacte()
    {
        $model = new ConfiguracioModel();
        $data = [
            'dades_contacte' => $model->where('tipus', 'dades_contacte')->findAll(),
        ];

        var_dump($data);
        die;

        return view('configuracio/dadesContacte', $data);
    }


}
