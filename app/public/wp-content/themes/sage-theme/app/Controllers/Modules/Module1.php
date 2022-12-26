<?php

namespace App\Controllers\Modules;

class Module1
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
