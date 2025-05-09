<?php

use App\Models\ConfiguracioModel;

if (!function_exists('mostrar_tree')) {
    function mostrar_tree()
    {
        $model = new ConfiguracioModel();

        $categories = $model->where('tipus', 'menu_general') ->where('visibilitat', 1)->orderBy('ordre', 'ASC')->findAll();

        return build_menu_tree($categories);
    }
}

if (!function_exists('build_menu_tree')) {
    function build_menu_tree(array $elements, int $parentId = 0)
    {
        $branch = [];

        foreach ($elements as $element) {
            if ((int)$element['id_pare'] === $parentId) {
                $children = build_menu_tree($elements, (int)$element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }
}

