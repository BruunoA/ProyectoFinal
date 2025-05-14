<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use SIENSIS\KpaCrud\Libraries\KpaCrud;

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

        if ($user->nom !== $name) {
            session()->setFlashdata('errorLogin', '<p style="background-color:red; color:black">Error al intentar iniciar sessio, usuari o contrasenya no valids</p>');
            return redirect()->back()->withInput();
        } else if (!password_verify($password, $user->password)) {
            session()->setFlashdata('errorLogin', '<p style="background-color:red; color:black">Error al intentar iniciar sessio, usuari o contrasenya no valids</p>');
            return redirect()->back()->withInput();
        } else {
        }

        $userData = [
            'id' => $user->id,
            'nom' => $user->nom,
            'rol' => $user->rol,
            'logged_in' => true,
        ];

        session()->set($userData);
        return redirect()->to(base_url('/'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function gestioUsuaris()
    {
        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('users');
        $crud->setPrimaryKey('id');

        $crud->setColumns(['nom', 'rol']);
        $crud->addPostAddCallBack(array($this, 'hashNewPassword'));
        $crud->addPostEditCallBack(array($this, 'hashEditPassword'));

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'password' => ['name' => 'password', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'rol' => ['name' => 'rol', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => [1 => 'admin', 2 => 'superadmin']],
        ]);

        // $crud->setConfig('onlyView');
        // $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);
        $crud->setConfig('modify', true);

        $data['output'] = $crud->render();

        return view('users/usuaris', $data);
    }

    public function hashNewPassword($postData)
    {
        $postData['data_password'] = password_hash($postData['data_password'], PASSWORD_DEFAULT);
        return $postData;
    }

    public function hashEditPassword($postData)
    {
        if ($postData['data_password'] != '') {
            // field has a new value. You new to generate new password
            $postData['data_password'] = password_hash($postData['data_password'], PASSWORD_DEFAULT);
        } else {
            unset($postData['data_password']);
        }
        return $postData;
    }
}
