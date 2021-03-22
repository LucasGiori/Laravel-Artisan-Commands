<?php 

namespace App\Console\Utils;

class Util {

    public static function formatArrayToString(array $elements): string
    {
        return implode(" ", $elements);
    }

    
}