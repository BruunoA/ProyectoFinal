<?php

use App\Models\ConfiguracioModel;

if (!function_exists('mostrar_tree')) {
    function mostrar_tree ($categories) {
        //mostrar categoria
        $model = new ConfiguracioModel();
        echo "<ol>";
     
        foreach ($categories as $cat) {
            echo "<li>" . $cat['nom'] . "</li>";

            $fills = $model->get_fills($cat['id']);
            
            if (count($fills)>0 )
                mostrar_tree($fills);
        }
        echo "</ol>";
    }
}


