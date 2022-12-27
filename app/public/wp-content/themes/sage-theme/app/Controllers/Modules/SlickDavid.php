<?php

namespace App\Controllers\Modules;

class SlickDavid
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
