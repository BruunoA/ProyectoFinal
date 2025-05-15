<?php

use App\Models\ConfiguracioModel;

if (!function_exists('mostrar_footer')) {
    function mostrar_footer()
    {
        $model = new ConfiguracioModel();

        $xarxes = $model->where('tipus', 'xarxes_socials') ->where('visibilitat', 1)->orderBy('ordre', 'ASC')->findAll();

        return build_menu_tree($xarxes);
    }
}
