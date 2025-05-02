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

    // SUB-19 JUVENIL
    public function juvenil_segon_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Juvenil segona divisio')->where('grup', 'Grup 47')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/juvenil_segona', $data);
    }

        // public function juvenil_segona()
    // {
    //     $model = new ClassificacioModel();

    //     $classificacio = $model->where('categoria', 'Juvenil segona divisio')->where('grup', 'Grup 46')->findAll();

    //     $data = [
    //         'classificacio' => $classificacio,
    //     ];

    //     return view('programes/juvenil_segona', $data);
    // }


    // AMATEUR
    public function amateur_segona()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Segona catalana')->where('grup', 'Grup 5')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/amateur_segona', $data);
    }

    public function amateur_tercera()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Tercera catalana')->where('grup', 'Grup 14')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/amateur_tercera', $data);
    }


    // SUB-16 CADET
    public function cadet_primera_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Cadet primera divisio')->where('grup', 'Grup 14')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/cadet_primera', $data);
    }

    public function cadet_segona_B()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Cadet segona divisio')->where('grup', 'Grup 55')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/cadet_segona', $data);
    }


    // SUB-14 INFANTIL
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


    // SUB-12 ALEVÍ
    public function alevi_primera_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Alevi primera divisio')->where('grup', 'Grup 9')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/alevi_primera_A', $data);
    }

    public function alevi_segona_S12_B()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Alevi segona divisio')->where('grup', 'Grup 22')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/alevi_segona_S12_B', $data);
    }

    public function alevi_segona_S11_B()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Alevi segona divisio')->where('grup', 'Grup 17')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/alevi_segona_S11_B', $data);
    }

    public function alevi_preferent_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Alevi preferent')->where('grup', 'Grup 5')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/alevi_preferent_A', $data);
    }


    // SUB-10 BENJAMÍ
    public function benjami_primera_S10_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Benjami primera divisio')->where('grup', 'Grup 13')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/benjami_primera_S10_A', $data);
    }

    public function benjami_primera_S9_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Benjami primera divisio')->where('grup', 'Grup 11')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/benjami_primera_S9_A', $data);
    }

}
