<?php

namespace App\Controllers\Modules;

class TheCompass
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
