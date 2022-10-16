<?php

namespace actions;

use base\Request;
use base\Response;

abstract class AbstractAction
{
    abstract public function run(Request $request): Response;
}