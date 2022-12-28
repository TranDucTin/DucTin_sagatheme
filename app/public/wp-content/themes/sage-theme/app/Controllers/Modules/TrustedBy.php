<?php

namespace App\Controllers\Modules;

class TrustedBy
{
    public function dataModule($module)
    {
        return (object) [
            'module' => $module
        ];
    }
}
