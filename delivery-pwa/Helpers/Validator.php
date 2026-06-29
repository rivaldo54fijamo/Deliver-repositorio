<?php

namespace App\Helpers;

class Validator
{
    public static function required($value)
    {
        return isset($value) && trim($value) !== '';
    }

    public static function min($value, $length)
    {
        return strlen(trim($value)) >= $length;
    }

    public static function number($value)
    {
        return is_numeric($value);
    }

    public static function match($a, $b)
    {
        return $a === $b;
    }
}
