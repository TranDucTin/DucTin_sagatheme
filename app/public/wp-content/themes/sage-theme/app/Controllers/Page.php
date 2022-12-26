<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Page extends Controller
{
    use \App\Services\Filters;

    protected $acf = ['c8_templates'];

    public static function getDataModule($module)
    {
        $moduleName = $module->acf_fc_layout;
        $moduleName = ucwords(str_replace('_', ' ', $moduleName));
        $moduleName = trim(str_replace(' ', '', $moduleName));
        
        if (file_exists(dirname(__DIR__) . "/Controllers/Modules/$moduleName.php")) {
            $class = "App\Controllers\Modules\\$moduleName";
            $moduleTmp = new $class();
            return $moduleTmp->dataModule((array)$module);
        }

        return false;
    }
}
