<?php

namespace base\console;

use base\AbstractAction;
use base\AbstractRouter;

class Router extends AbstractRouter
{
    /**
     * @param Request $request
     * @return AbstractAction|null
     */
    public function getAction($request)
    {
        $actionName = $request->getParam('action');

        if (empty($actionName)) {
            return null;
        }

        $actionClass = '\\actions\\' . ucfirst($actionName) . 'Action';

        if (!class_exists($actionClass)) {
            return null;
        }

        return (new $actionClass);
    }
}