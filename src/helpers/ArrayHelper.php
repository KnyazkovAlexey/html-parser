<?php

namespace helpers;

class ArrayHelper
{
    public static function getColumn(array $array, string $attribute): array
    {
        $column = [];
        foreach ($array as $item) {
            $column[] = $item->$attribute;
        }

        return $column;
    }
}