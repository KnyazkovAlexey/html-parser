<?php

namespace traits;

/**
 * Implements ArrayAccess, Iterator, Countable interfaces
 */
trait Collection
{
    protected array $items = [];

    public function offsetExists($offset)
    {
        return array_key_exists($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if ('' == $offset) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    public function current()
    {
        return current($this->items);
    }

    public function next()
    {
        return next($this->items);
    }

    public function key()
    {
        return key($this->items);
    }

    public function valid()
    {
        return false !== current($this->items);
    }

    public function rewind()
    {
        reset($this->items);
    }

    public function count()
    {
        return count($this->items);
    }
}