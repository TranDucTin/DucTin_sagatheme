<?php

namespace App\Controllers\Modules;

class Module4
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
