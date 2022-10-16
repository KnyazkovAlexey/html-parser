<?php

namespace base;

class Response extends BaseObject
{
    public string $output;

    public function send()
    {
        if (!empty($this->output)) {
            echo $this->output;
        }
    }
}