<?php

namespace App\Controllers\Modules;

class BannerHome
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
