<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClassificacioModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProgramesController extends BaseController
{
    public function index()
    {
        return view('programes/programes');
    }

    public function amateur_segona()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Segona catalana')->where('grup', 'Grup 5')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/amateur_segona', $data);
    }

    public function juvenil_segona()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Juvenil segona divisio')->where('grup', 'Grup 46')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/juvenil_segona', $data);
    }

    public function cadet_primera()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Cadet primera divisio')->where('grup', 'Grup 14')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/cadet_primera', $data);
    }

    public function cadet_segona()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Cadet segona divisio')->where('grup', 'Grup 55')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/cadet_segona', $data);
    }

    public function infantil_segona_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Infantil segona divisio s14')->where('grup', 'Grup 28')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/infantil_segona_A', $data);
    }

    public function infantil_segona_B()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Infantil segona divisio s14')->where('grup', 'Grup 29')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/infantil_segona_B', $data);
    }


}
