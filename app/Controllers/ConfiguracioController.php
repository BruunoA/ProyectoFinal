<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracioModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MenuModel;
use SIENSIS\KpaCrud\Libraries\KpaCrud;

class ConfiguracioController extends BaseController
{

    public function menuProva(){

        $model = new ConfiguracioModel();

        $data = [
            'menu' => $model->where('tipus', 'menu_general')->where('visibilitat', 'Si')->findAll(),
        ];

        return view('general/provaMenu', $data);
    }

    public function dades_contacte()
    {
        // $model = new ConfiguracioModel();
        // $data = [
        //     'dades_contacte' => $model->where('tipus', 'dades_contacte')->findAll(),
        // ];

        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('configuracio');
        $crud->setPrimaryKey('id');
        $crud->addWhere('tipus', 'dades_contacte');

        $crud->setColumns(['id', 'nom', 'valor', 'tipus', 'visibilitat']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => 'text', 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => 'text', 'html_atts' => ["required"],],
            'valor' => ['name' => 'valor', 'type' => 'text', 'html_atts' => ["required"],],
            'id_pare' => ['name' => 'id_pare', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'ordre' => ['name' => 'ordre', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'icon' => ['name' => 'icona', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'tipus' => ['name' => 'tipus', 'type' => 'dropdown', 'html_atts' => ["required"], 'options' => ['dades_contacte' => 'Dades de contacte',]],
            'visibilitat' => ['name' => 'visibilitat', 'type' => 'dropdown', 'html_atts' => ["required"], 'options' => ['Si' => 'Visible', 'No' => 'No visible']],
        ]);

        // $crud->setConfig('onlyView');
        // $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);
        $crud->setConfig('modify', true);

        $data['output'] = $crud->render();

        return view('configuracio/dadesContacte', $data);
    }

    // public function dades_contacteModify($id)
    // {
    //     $model = new ConfiguracioModel();
    //     $data['dades_contacte'] = $model->find($id);
    //     return view('configuracio/dadesContacteModify', $data);
    // }

    // public function dades_contacteModify_post($id)
    // {
    //     $model = new ConfiguracioModel();
    //     $data = [
    //         'nom' => $this->request->getPost('nom'),
    //         'valor' => $this->request->getPost('valor'),
    //     ];

    //     if (!$model->validate($data)) {
    //         return redirect()->back()->withInput()->with('errors', $model->errors());
    //     } else {
    //         $model->save($id, $data);
    //         return redirect()->to('/configuracio/dades_contacte');
    //     }
    // }

    // public function dades_contacteDelete($id)
    // {
    //     $model = new ConfiguracioModel();
    //     $model->delete($id);
    //     return redirect()->to('/configuracio/dades_contacte');
    // }

    public function menu()
    {

        // $model = new ConfiguracioModel();

        // $data['menu'] = $model->where('tipus', 'menu_general')->findAll();
        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('configuracio');
        $crud->setPrimaryKey('id');
        $crud->addWhere('tipus', 'menu_general');

        $crud->setColumns(['id', 'nom', 'icon', 'valor', 'tipus', 'visibilitat', 'ordre', 'id_pare']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => 'text', 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => 'text', 'html_atts' => ["required"],],
            'icon' => ['name' => 'icona', 'type' => 'text'],
            'valor' => ['name' => 'valor', 'type' => 'text', 'html_atts' => ["required"],],
            'tipus' => ['name' => 'tipus', 'type' => 'dropdown', 'html_atts' => ["required"], 'options' => ['menu_general' => 'Menu general']],
            'visibilitat' => ['name' => 'visibilitat', 'type' => 'dropdown', 'html_atts' => ["required"], 'options' => ['Si' => 'Visible', 'No' => 'No visible']],
            'ordre' => ['name' => 'ordre', 'type' => KpaCrud::NUMBER_FIELD_TYPE, 'html_atts' => ["required"],],
        ]);

        // $crud->setConfig('onlyView');
        $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);

        $data['output'] = $crud->render();
        return view('configuracio/menu', $data);
    }

    public function menuGestio()
    {

        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('configuracio');
        $crud->setPrimaryKey('id');
        $crud->addWhere('tipus', 'menu_gestio');

        $crud->setColumns(['id', 'nom', 'icon', 'valor', 'tipus', 'visibilitat', 'ordre', 'id_pare']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => 'text', 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => 'text', 'html_atts' => ["required"],],
            'icon' => ['name' => 'icona', 'type' => 'text'],
            'valor' => ['name' => 'valor', 'type' => 'text', 'html_atts' => ["required"],],
            'tipus' => ['name' => 'tipus', 'type' => 'dropdown', 'html_atts' => ["required"], 'options' => ['menu_gestio' => 'Menu gestio']],
            'visibilitat' => ['name' => 'visibilitat', 'type' => 'dropdown', 'html_atts' => ["required"], 'options' => ['Si' => 'Visible', 'No' => 'No visible']],
            'ordre' => ['name' => 'ordre', 'type' => KpaCrud::NUMBER_FIELD_TYPE, 'html_atts' => ["required"],],
        ]);

        // $crud->setConfig('onlyView');
        $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);

        $data['output'] = $crud->render();

        return view('configuracio/menuGestio', $data);
    }

    // public function menuModify($id)
    // {
    //     $model = new ConfiguracioModel();
    //     $data['menu'] = $model->find($id);
    //     return view('configuracio/menuModify', $data);
    // }

    // public function menuModify_post($id)
    // {
    //     $model = new ConfiguracioModel();
    //     $data = [
    //         'nom' => $this->request->getPost('nom'),
    //         'valor' => $this->request->getPost('valor'),
    //         'id_pare' => $this->request->getPost('id_pare'),
    //         'visibilitat' => $this->request->getPost('visibilitat'),
    //         'ordre' => $this->request->getPost('ordre')
    //     ];

    //     $tipus = $this->request->getPost('tipus');

    //     if (!$model->validate($data)) {
    //         return redirect()->back()->withInput()->with('errors', $model->errors());
    //     } else {
    //         $model->update($id, $data);
    //         // return redirect()->to('/configuracio/menu');
    //     }

    //     if($tipus == 'menu_gestio'){
    //         return redirect()->to('config/menu_gestio');
    //     }else{
    //         return redirect()->to('config/menu_general');
    //     }
    // }

    // public function menuDelete($id)
    // {
    //     $model = new ConfiguracioModel();
    //     $model->delete($id);
    //     return redirect()->to('config/menu_general');
    // }

    // public function menuAdd()
    // {
    //     return view('configuracio/menuAdd');
    // }

    // public function menuAdd_post()
    // {
    //     $model = new ConfiguracioModel();
    //     $data = [
    //         'nom' => $this->request->getPost('nom'),
    //         'valor' => $this->request->getPost('valor'),
    //         'tipus' => $this->request->getPost('tipus'),
    //         'id_pare' => $this->request->getPost('id_pare'),
    //         'visibilitat' => $this->request->getPost('visibilitat'),
    //         'ordre' => $this->request->getPost('ordre')
    //     ];

    //     $tipus = $this->request->getPost('tipus');

    //     if (!$model->validate($data)) {
    //         return redirect()->back()->withInput()->with('errors', $model->errors());
    //     } else {
    //         $model->insert($data);
    //         // return redirect()->to('config/menu_general');
    //     }

    //     if($tipus == 'menu_gestio'){
    //         return redirect()->to('config/menu_gestio');
    //     }else{
    //         return redirect()->to('config/menu_general');
    //     }
    // }

    public function xarxes_socials()
    {

        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('configuracio');
        $crud->setPrimaryKey('id');
        $crud->addWhere('tipus', 'xarxes_socials');

        $crud->setColumns(['id', 'nom', 'icon', 'valor', 'tipus', 'visibilitat']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => 'text', 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => 'text', 'html_atts' => ["required"],],
            'icon' => ['name' => 'icona', 'type' => 'text'],
            'valor' => ['name' => 'valor', 'type' => 'text', 'html_atts' => ["required"],],
            'tipus' => ['name' => 'tipus', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => ['xarxes_socials' => 'Xarxes socials']],
            'ordre' => ['name' => 'ordre', 'type' => 'text', 'html_atts' => ["required"],],
            'visibilitat' => ['name' => 'visibilitat', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => ['Si' => 'Visible', 'No' => 'No visible']],
            'id_pare' => ['name' => 'id_pare', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'ordre' => ['name' => 'ordre', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
        ]);

        // $crud->setConfig('onlyView');
        $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);

        $data['output'] = $crud->render();

        return view('configuracio/xarxes_socials', $data);
    }
}
