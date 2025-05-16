<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracioModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MenuModel;
use SIENSIS\KpaCrud\Libraries\KpaCrud;

class ConfiguracioController extends BaseController
{

    // public function index()
    // {
    //     $data['controller'] = $this;

    //     $model = new ConfiguracioModel();

    //     $data["cat"] = $model->get_fills(NULL);

    //     return view('general/menu', $data);
    // }

    // public function mostrar_tree($categories)
    // {
    //     //mostrar categoria
    //     echo "<ol>";

    //     foreach ($categories as $cat) {
    //         echo "<li>" . $cat['nom'] . "</li>";

    //         $model = new ConfiguracioModel();
    //         $fills = $model->get_fills($cat['id']);

    //         if (count($fills) > 0)
    //             $this->mostrar_tree($fills);
    //     }
    //     echo "</ol>";
    // }

    public function dades_contacte()
    {

        $crud = new \SIENSIS\KpaCrud\Libraries\KpaCrud();

        $crud->setTable('configuracio');
        $crud->setPrimaryKey('id');
        $crud->addWhere('tipus', 'dades_contacte');

        $crud->setColumns(['nom']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'valor' => ['name' => 'valor', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'zona' => ['name' => 'zona', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'tipus' => ['name' => 'tipus', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => ['dades_contacte' => 'Dades de contacte']],
            'id_pare' => ['name' => 'id_pare', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'ordre' => ['name' => 'ordre', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'icona' => ['name' => 'icona', 'type' =>  KpaCrud::INVISIBLE_FIELD_TYPE],
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

        $crud->setColumns(['nom', 'valor', 'visibilitat']);

        $id_pares = new ConfiguracioModel();

        $pares = $id_pares->where('tipus', 'menu_general')->where('id_pare', null)->groupBy('nom')->orderBy('ordre', 'ASC')->findAll();
        $nomsPares = [];

        $nomsPares[0] = 'No pare';

        foreach ($pares as $pare) {
            $nomsPares[$pare['id']] = $pare['nom'];
        }


        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'icona' => ['name' => 'icona', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'zona' => ['name' => 'zona', 'type' =>  KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => ['superior' => 'Superior', 'inferior' => 'Inferior']],
            'valor' => ['name' => 'enllaç', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'tipus' => ['name' => 'tipus', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => ['menu_general' => 'Menu general']],
            'id_pare' => ['name' => 'id_pare', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'options' => $nomsPares],
            'visibilitat' => ['name' => 'visibilitat', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => [1 => 'Visible', 0 => 'No visible']],
            'ordre' => ['name' => 'ordre', 'type' => KpaCrud::NUMBER_FIELD_TYPE, 'html_atts' => ["required", 'min=1'],],
        ]);

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
            'id' => ['name' => 'codi', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'icon' => ['name' => 'icona', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE],
            'valor' => ['name' => 'valor', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'tipus' => ['name' => 'tipus', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => ['menu_gestio' => 'Menu gestio']],
            'visibilitat' => ['name' => 'visibilitat', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => ['Si' => 'Visible', 'No' => 'No visible']],
            'ordre' => ['name' => 'ordre', 'type' => KpaCrud::NUMBER_FIELD_TYPE, 'html_atts' => ["required"],],
        ]);

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

        $crud->setColumns(['nom']);

        $crud->setColumnsInfo([
            'id' => ['name' => 'codi', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'nom' => ['name' => 'nom', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'icona' => ['name' => 'icona', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE],
            'zona' => ['name' => 'zona', 'type' =>  KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => ['superior' => 'Superior', 'inferior' => 'Inferior']],
            'valor' => ['name' => 'valor', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'tipus' => ['name' => 'tipus', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => ['xarxes_socials' => 'Xarxes socials']],
            'ordre' => ['name' => 'ordre', 'type' => KpaCrud::TEXTAREA_FIELD_TYPE, 'html_atts' => ["required"],],
            'visibilitat' => ['name' => 'visibilitat', 'type' => KpaCrud::DROPDOWN_FIELD_TYPE, 'html_atts' => ["required"], 'options' => [1 => 'Visible', 0 => 'No visible']],
            'id_pare' => ['name' => 'id_pare', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
            'ordre' => ['name' => 'ordre', 'type' => KpaCrud::INVISIBLE_FIELD_TYPE],
        ]);

        $crud->setConfig(["editable" => true,]);
        $crud->setConfig('delete', true);
        $crud->setConfig('add', true);

        $data['output'] = $crud->render();

        return view('configuracio/xarxes_socials', $data);
    }
}
