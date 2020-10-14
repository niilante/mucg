<?php

namespace App;

trait PluckableTrait
{
    public static function byCustomField($custom_field, $name)
    {
        $temps = self::where($custom_field, $name);

        if (count($temps->get()) > 0) {
            return $temps->first();
        }

        return null;
    }

    public static function getIdByCustomField($custom_field, $name)
    {
        $temp = self::byCustomField($custom_field, $name);

        if ($temp) {
            return $temp->id;
        }

        return null;
    }
}
