<?php

namespace App\Controllers\Modules;

class ModConnecting
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
