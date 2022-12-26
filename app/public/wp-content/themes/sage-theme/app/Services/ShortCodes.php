<?php

namespace App\Services;

class ShortCodes
{
    public function init()
    {
        add_shortcode('get_year', array($this, 'getYear'));
    }

    /* get year show in copy right  */
    public function getYear()
    {
        return date('Y');
    }
}
