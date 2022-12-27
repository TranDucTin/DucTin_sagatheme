<?php

namespace App\Controllers\Modules;

class SlickOuropen
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
