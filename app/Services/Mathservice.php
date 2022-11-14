<?php

namespace App\Services;

use App\Services\MathInterface;

class Mathservice implements MathInterface
{
    static function combine($ar1, $ar2)
    {
        return array_combine($ar1, $ar2);
    }
    function reverse(array $numbers)
    {
        return array_reverse($numbers);
    }
    function intersect(array $ar1, array $ar2, bool $isAssoc)
    {
        return array_intersect($ar1, $ar2);
    }
    function diff(array $ar1, array $ar2, bool $isAssoc)
    {
        return array_diff($ar1, $ar2);
    }
    function merge(array $ar1, array $ar2)
    {
        return array_merge($ar1, $ar2);
    }
    function merge_recursive(array $ar1, array $ar2)
    {
        return array_merge_recursive($ar1, $ar2);
    }
}