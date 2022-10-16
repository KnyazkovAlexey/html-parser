<?php

namespace base;

abstract class AbstractRequest extends BaseObject
{
    abstract public function getParam(string $name): mixed;
}