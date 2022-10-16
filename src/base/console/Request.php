<?php

namespace base\console;

use base\AbstractRequest;

class Request extends AbstractRequest
{
    public function getParam(string $name): mixed
    {
        return !empty($opt = getopt(null, ["$name:"])) ? $opt[$name] : null;
    }
}