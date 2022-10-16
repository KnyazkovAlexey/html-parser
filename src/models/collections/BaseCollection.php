<?php

namespace models\collections;

use base\BaseObject;
use ArrayAccess;
use Iterator;
use Countable;
use traits\Collection;

class BaseCollection extends BaseObject implements ArrayAccess, Iterator, Countable
{
    use Collection;

    public function getColumn(string $attribute): array
    {
        $column = [];
        foreach ($this as $item) {
            $column[] = $item->$attribute;
        }

        return $column;
    }
}