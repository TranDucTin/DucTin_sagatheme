<?php

namespace App\Controllers\Modules;

class Module8
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
