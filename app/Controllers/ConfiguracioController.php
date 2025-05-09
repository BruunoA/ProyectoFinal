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

        $crud->setColumns(['nom','visibilitat']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => 'text', 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => 'text', 'html_atts' => ["required"],],
            'valor' => ['name' => 'valor', 'type' => 'text', 'html_atts' => ["required"],],
            'id_pare' => ['name' => 'id_pare', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'ordre' => ['name' => 'ordre', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'icona' => ['name' => 'icona', 'type' =>  KpaCrud::TEXTAREA_FIELD_TYPE],
            'visibilitat' => ['name' => 'visibilitat', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => [1 => 'Visible', 0 => 'No visible']],
        ]);

        // $crud->setConfig('onlyView');
        // $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);
        $crud->setConfig('modify', true);

        $data['output'] = $crud->render();

        return view('configuracio/dadesContacte', $data);
    }


    public function menu()
    {
        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('configuracio');
        $crud->setPrimaryKey('id');
        $crud->addWhere('tipus', 'menu_general');

        $crud->setColumns(['nom', 'valor', 'visibilitat', 'ordre', 'id_pare']);

        $id_pares = new ConfiguracioModel();

        $pares = $id_pares->where('tipus', 'menu_general')->where('id_pare', null)->findAll();
        $nomsPares = [];

        $nomsPares[0] = 'No pare';

        foreach ($pares as $pare) {
            $nomsPares[$pare['id']] = $pare['nom'];
        }


        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'icona' => ['name' => 'icona', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE],
            'valor' => ['name' => 'valor', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'tipus' => ['name' => 'tipus', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => ['menu_general' => 'Menu general']],
            'id_pare' => ['name' => 'id_pare', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'options' => $nomsPares],
            'visibilitat' => ['name' => 'visibilitat', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => [1 => 'Visible', 0 => 'No visible']],
            'ordre' => ['name' => 'ordre', 'type' => KpaCrud::NUMBER_FIELD_TYPE, 'html_atts' => ["required", 'min=1'],],
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

    public function xarxes_socials()
    {

        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('configuracio');
        $crud->setPrimaryKey('id');
        $crud->addWhere('tipus', 'xarxes_socials');

        $crud->setColumns(['nom', 'valor', 'visibilitat']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => 'text', 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => 'text', 'html_atts' => ["required"],],
            'icona' => ['name' => 'icona', 'type' => 'text'],
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
