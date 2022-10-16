<?php

namespace actions;

use base\AbstractAction;
use base\console\Request;
use base\console\Response;
use services\parsers\HtmlParser;
use base\exceptions\UserException;
use validators\UrlValidator;

class ParseAction extends AbstractAction
{
    /**
     * @param Request $request
     * @return Response
     * @throws UserException
     */
    public function run($request)
    {
        $url = $request->getParam('url');

        if (empty($url)) {
            throw new UserException('Url parameter is required');
        }

        $validator = new UrlValidator();

        if (!$validator->validate($url)) {
            throw new UserException($validator->getFirstErrorMessage());
        }

        $tagsNames = (new HtmlParser())->parseUrl($url)->getNames();

        $output = 'Count: ' . count($tagsNames) . PHP_EOL;
        $output .= 'Names: ' . implode(', ', $tagsNames) . PHP_EOL;

        return new Response(['output' => $output]);
    }
}