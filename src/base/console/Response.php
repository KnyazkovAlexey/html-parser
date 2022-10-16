<?php

namespace base\console;

use base\AbstractResponse;

class Response extends AbstractResponse
{
    public string $output;

    public function send(): void
    {
        if (!empty($this->output)) {
            echo $this->output;
        }
    }
}