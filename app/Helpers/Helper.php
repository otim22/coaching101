<?php

namespace App\Helpers;

class Helper
{
    public static function set_active($path, $active = 'active')
    {
        return call_user_func_array('Request::is', (array)$path) ? $active : ' ';
    }

    /**
     * Generate initials from a name
     *
     * @param string $name
     * @return string
     */
    public static function generate_initials(string $name) : string
    {
        $words = explode(' ', $name);
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
        }
        return $this->makeInitialsFromSingleWord($name);
    }

    /**
     * Make initials from a word with no spaces
     *
     * @param string $name
     * @return string
     */
    protected function makeInitialsFromSingleWord(string $name) : string
    {
        preg_match_all('#([A-Z]+)#', $name, $capitals);
        if (count($capitals[1]) >= 2) {
            return substr(implode('', $capitals[1]), 0, 2);
        }
        return strtoupper(substr($name, 0, 2));
    }
}
