<?php

namespace services\parsers;

use models\collections\ParsedItemsCollection;
use models\ParsedItem;

class HtmlParser extends AbstractParser
{
    /**
     * @inheritdoc
     */
    public function parse(string $str): ParsedItemsCollection
    {
        $parsedItems = new ParsedItemsCollection;

        preg_match_all('~<([^>]+)/?>~', $str, $matches);
        //body bgcolor="#fff", div id="mngb", /div, ...

        foreach ($matches[1] as $match) {
            if (str_starts_with($match, '/')) {
                continue; //exclude closing tags
            }

            $tagName = explode(' ', $match)[0]; //remove html-attributes
            $parsedItems[] = new ParsedItem(['name' => $tagName]);
        }

        return $parsedItems;
    }
}