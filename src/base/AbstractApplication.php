<?php

namespace base;

abstract class AbstractApplication extends BaseObject
{
    public string $appName;

    abstract public function run(): void;
}