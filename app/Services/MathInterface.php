<?php

namespace App\Services;

interface MathInterface
{
    function reverse(array $numbers);
    function intersect(array $arr1, array $arr2, bool $isAssoc);
    function diff(array $arr1, array $arr2, bool $isAssoc);
    function merge(array $arr1, array $arr2);
    function merge_recursive(array $arr1, array $arr2);
    static function combine(array $arr1, array $arr2);
}