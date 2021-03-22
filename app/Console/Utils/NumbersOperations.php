<?php

namespace App\Console\Utils;

class NumbersOperations {
    
    public static function isImpar(int $number): bool
    {
        return !($number % 2 == 0);
    }

    public static function isPar(int $number): bool
    {
        return $number % 2 == 0;
    }

    public static function filterElementsIsNumeric(array $numbers): array
    {
        $numbers = array_map(function($number) {
            if(is_numeric($number)) {
                return $number;
            }
        }, $numbers);

        return $numbers;
    }
}