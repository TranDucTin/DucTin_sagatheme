<?php

namespace App\Controllers\Modules;

class Module3
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
