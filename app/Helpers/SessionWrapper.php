<?php

namespace App\Helpers;

use App\Models\Standard;

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

    public static function getStandardId()
    {
        $id = self::getData('standardId');
        $standards = Standard::get();

        foreach($standards as $standard) {
            if($id < 0 && $standard->status == 'active') {
                self::setStandardId($standard->id);
                $id = $standard->id;
            }
        }

        return $id;
    }
}
