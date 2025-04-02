<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class UsersController extends BaseController
{
    public function login()
    {

        helper(["form"]);

        return view('users/login');
    }

    public function loginVerify()
    {

        helper(["form"]);
        helper(["session"]);

        $validationRules = [
            'nom' => 'required',
            'password' => 'required'
        ];

        $name = $this->request->getPost('nom');
        $password = $this->request->getPost('password');

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput();
        }

        $model = new UsersModel();
        $user = $model->where('nom', $name)->get()->getRow();

        if (!password_verify($password, $user->password)) {
            session()->setFlashdata('errorLogin', 'Error al intentar iniciar sessio, usuari o contrasenya no valids');
            return redirect()->back()->withInput();
        } else {    // en el cas de que el nom d'usuari no sigui el correcte, també torna a la vista de login amb el missatge d'error
            if ($user->nom !== $name) {
                session()->setFlashdata('errorLogin', 'Error al intentar iniciar sessio, usuari o contrasenya no valids');
                return redirect()->back()->withInput();
            }
        }

        $userData = [
            'id' => $user->id,
            'nom' => $user->nom,
            'logged_in' => true,
        ];

        session()->set($userData);

        return redirect()->to(base_url('home'));
    }
}
