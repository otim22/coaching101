<?php

namespace App\Helpers;


class SessionWrapper
{
    public static function getData($key)
    {
        return session($key);
    }

    public static function storeData($key, $value)
    {
        session([$key => $value]);
    }

    public static function setDefault($key, $value)
    {
        session($key, $value);
    }

    public static function setStandardId($value)
    {
        self::storeData('standardId', $value);
    }

    public static function deleteData($key)
    {
        session()->forget($key);
    }
}
