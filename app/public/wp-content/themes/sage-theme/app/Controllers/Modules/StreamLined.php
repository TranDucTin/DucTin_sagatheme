<?php

namespace App\Controllers\Modules;

class StreamLined
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
