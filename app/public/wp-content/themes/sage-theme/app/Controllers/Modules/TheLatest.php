<?php

namespace App\Controllers\Modules;

class TheLatest
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
