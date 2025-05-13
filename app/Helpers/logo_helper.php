<?php

use App\Models\BannerModel;

if (!function_exists('mostrar_logo')) {
    function mostrar_logo()
    {
        $model = new BannerModel();

        $logo = $model->where('tipus', 'logo') ->where('destacat', 1)->orderBy('created_at', 'ASC')->first();

        return $logo;
    }
}