<?php

namespace App\Controllers\Modules;

class Module6
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
