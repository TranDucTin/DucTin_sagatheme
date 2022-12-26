<?php

namespace App\Controllers\Modules;

class Module7
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
