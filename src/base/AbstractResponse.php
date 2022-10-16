<?php

namespace base;

abstract class AbstractResponse extends BaseObject
{
    abstract public function send(): void;
}