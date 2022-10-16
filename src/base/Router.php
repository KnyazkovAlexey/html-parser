<?php

namespace base;

use actions\AbstractAction;

class Router
{
    public function getAction(Request $request): ?AbstractAction
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