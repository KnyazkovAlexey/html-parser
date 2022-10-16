<?php

namespace services;

use base\BaseObject;
use models\ParsedItem;

abstract class AbstractParser extends BaseObject
{
    /**
     * @param string $str
     * @return ParsedItem[]
     */
    abstract public function parse(string $str): array;

    /**
     * @param string $url
     * @return ParsedItem[]
     */
    public function parseUrl(string $url): array
    {
        $str = file_get_contents($url);

        if ($str === false) {
            $str = '';
        }

        return static::parse($str);
    }
}