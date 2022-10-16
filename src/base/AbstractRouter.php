<?php

namespace base;

abstract class AbstractRouter extends BaseObject
{
    /**
     * @param AbstractRequest $request
     * @return AbstractAction|null
     */
    abstract public function getAction($request);
}