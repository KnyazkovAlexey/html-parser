<?php

namespace services\parsers;

use base\BaseObject;
use models\collections\ParsedItemsCollection;

abstract class AbstractParser extends BaseObject
{
    /**
     * @param string $str
     * @return ParsedItemsCollection
     */
    abstract public function parse(string $str): ParsedItemsCollection;

    /**
     * @param string $url
     * @return ParsedItemsCollection
     */
    public function parseUrl(string $url): ParsedItemsCollection
    {
        $str = file_get_contents($url);

        if ($str === false) {
            $str = '';
        }

        return static::parse($str);
    }
}