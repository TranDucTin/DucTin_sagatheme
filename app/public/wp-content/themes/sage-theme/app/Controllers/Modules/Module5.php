<?php

namespace App\Controllers\Modules;

class Module5
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
