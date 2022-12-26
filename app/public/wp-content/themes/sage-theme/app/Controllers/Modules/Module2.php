<?php

namespace App\Controllers\Modules;

class Module2
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
