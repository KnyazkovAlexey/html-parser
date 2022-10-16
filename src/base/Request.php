<?php

namespace base;

class Request
{
    public function getParam($name)
    {
        return !empty($opt = getopt(null, ["$name:"])) ? $opt[$name] : null;
    }
}