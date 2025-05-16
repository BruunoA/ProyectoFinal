<?php

use App\Models\ConfiguracioModel;

if (!function_exists('mostrar_footer_superior')) {
    function mostrar_footer_superior()
    {
        $model = new ConfiguracioModel();

        $xarxes = $model->where('tipus', 'xarxes_socials') ->where('visibilitat', 1)->where('zona', 'superior')->orderBy('ordre', 'ASC')->findAll();

        return build_menu_tree($xarxes);
    }
}

if (!function_exists('mostrar_footer_inferior')) {
    function mostrar_footer_inferior()
    {
        $model = new ConfiguracioModel();

        $xarxes = $model->where('tipus', 'xarxes_socials') ->where('visibilitat', 1)->where('zona', 'inferior')->orderBy('ordre', 'ASC')->findAll();

        return build_menu_tree($xarxes);
    }
}
