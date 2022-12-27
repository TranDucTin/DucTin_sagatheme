<?php

namespace App\Controllers\Modules;

class ContentCenter
{
    public function dataModule($module)
    {
        $content_1 ='EXPLORE ORCHESTRA';
        $content_2 ='EXPLORE ENCOMPASS CLOUD';
        $content_3 ='EXPLORE RETAIL SOLUTIONS';
        return (object) [
            'module' => $module,
            'content_1' => $content_1,
            'content_2'=>$content_2,
            'content_3'=>$content_3,
        ];
    }
}
