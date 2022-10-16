<?php

namespace base;

class BaseObject
{
    public function __construct(array $properties = [])
    {
        foreach ($properties as $name => $value) {
            $this->$name = $value;
        }
    }
}