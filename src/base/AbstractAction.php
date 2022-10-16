<?php

namespace base;

abstract class AbstractAction extends BaseObject
{
    /**
     * @param AbstractRequest $request
     * @return AbstractResponse
     */
    abstract public function run($request);
}