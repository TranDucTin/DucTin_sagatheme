<?php

namespace App\Controllers\Modules;

class ContentCenter
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
