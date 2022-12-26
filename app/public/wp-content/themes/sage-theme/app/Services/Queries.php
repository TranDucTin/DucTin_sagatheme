<?php

namespace App\Services;

class Queries
{
    public static function getOptionField($fieldName)
    {
        return get_field($fieldName, ACF_OPTION);
    }
}
