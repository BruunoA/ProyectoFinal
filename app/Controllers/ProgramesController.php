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

    public function categoria($segment)
    {
        $urls = [
            'juvenil-segona-divisio' => ['categoria' => 'Juvenil segona divisio', 'grup' => 'Grup 46', 'titol' => 'Juvenil segona divisio'],
            'cadet-primera-divisio' => ['categoria' => 'Cadet primera divisio', 'grup' => 'Grup 14', 'titol' => 'Cadet primera divisio'],
            'tercera-catalana' => ['categoria' => 'Tercera catalana', 'grup' => 'Grup 14', 'titol' => 'Tercera catalana'],
            'segona-catalana' => ['categoria' => 'Segona catalana', 'grup' => 'Grup 5', 'titol' => 'Segona catalana'],
            'cadet-segona-divisio' => ['categoria' => 'Cadet segona divisio', 'grup' => 'Grup 55', 'titol' => 'Cadet segona divisio'],
            'infantil-segona-divisio-s14' => ['categoria' => 'Infantil segona divisio s14', 'grup' => 'Grup 28'],
            'primera-divisio-alevi-s11' => ['categoria' => 'Primera divisio alevi s11', 'grup' => 'Grup 9'],
            'segona-divisio-alevi-s12' => ['categoria' => 'Segona divisio alevi s12', 'grup' => 'Grup 22'],
            'segona-divisio-alevi-s11' => ['categoria' => 'Segona divisio alevi s11', 'grup' => 'Grup 17'],
            'preferent-alevi-s12' => ['categoria' => 'Preferent alevi s12', 'grup' => 'Grup 5'],
        ];

        $info = $urls[$segment];

        $model = new ClassificacioModel();
        $classificacio = $model->where('categoria', $info['categoria'])->where('grup', $info['grup'])->findAll();

        $data = [
            'classificacio' => $classificacio,
            'titol' => $info['titol'],
        ];

        return view('programes/categoria', $data);
    }


    // SUB-19 JUVENIL
    public function juvenil_segon_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Juvenil segona divisio')->where('grup', 'Grup 46')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/sub-19/juvenil_segona', $data);
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

        return view('programes/amateur/amateur_segona', $data);
    }

    public function amateur_tercera()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Tercera catalana')->where('grup', 'Grup 14')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/amateur/amateur_tercera', $data);
    }


    // SUB-16 CADET
    public function cadet_primera_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Cadet primera divisio')->where('grup', 'Grup 14')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/sub-16/cadet_primera', $data);
    }

    public function cadet_segona_B()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Cadet segona divisio')->where('grup', 'Grup 55')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/sub-16/cadet_segona', $data);
    }


    // SUB-14 INFANTIL
    public function infantil_segona_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Infantil segona divisio s14')->where('grup', 'Grup 28')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/sub-14/infantil_segona_A', $data);
    }

    public function infantil_segona_B()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Infantil segona divisio s14')->where('grup', 'Grup 29')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/sub-14/infantil_segona_B', $data);
    }


    // SUB-12 ALEVÍ
    public function alevi_primera_A()       // ACABAR DE VEURE
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Alevi primera divisio')->where('grup', 'Grup 9')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/alevi_primera', $data);
    }

    public function alevi_segona_S12_B()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Segona divisio alevi s12')->where('grup', 'Grup 22')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/alevi_segona_S12', $data);
    }

    public function alevi_segona_S11_B()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Segona divisio alevi s11')->where('grup', 'Grup 17')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/alevi_segona_S11', $data);
    }

    public function alevi_preferent_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Preferent alevi s12')->where('grup', 'Grup 5')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/alevi_preferent', $data);
    }


    // SUB-10 BENJAMÍ
    public function benjami_primera_S10_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Primera divisio benjami s10')->where('grup', 'Grup 13')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/benjami_primera_S10_A', $data);
    }

    public function benjami_primera_S9_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Primera divisio benjami s9')->where('grup', 'Grup 11')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/benjami_primera_S9_A', $data);
    }


    // SUB-8 PREBENJAMÍ
    public function prebenjami_S8_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Prebenjami s8')->where('grup', 'Grup 25')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/prebenjami_S8_A', $data);
    }

    public function prebenjami_S7_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Prebenjami s7')->where('grup', 'Grup 14')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/prebenjami_S7_A', $data);
    }


    // FEMENÍ
    public function femeni_juvenil_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Segona divisio femenina juvenil')->where('grup', 'Grup 11')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/femeni_juvenil_A', $data);
    }

    public function femeni_infantil_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Segona divisio femenina infantil')->where('grup', 'Grup 20')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/femeni_infantil_A', $data);
    }

    public function femeni_alevi_A()
    {
        $model = new ClassificacioModel();

        $classificacio = $model->where('categoria', 'Segona divisio femenina alevi')->where('grup', 'Grup 12')->findAll();

        $data = [
            'classificacio' => $classificacio,
        ];

        return view('programes/femeni_alevi_A', $data);
    }
}
