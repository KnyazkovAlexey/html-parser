<?php

namespace actions;

use base\Request;
use base\Response;
use helpers\ArrayHelper;
use services\HtmlParser;
use exceptions\UserException;
use validators\UrlValidator;

class ParseAction extends AbstractAction
{
    /**
     * @param Request $request
     * @return Response
     * @throws UserException
     */
    public function run(Request $request): Response
    {
        $url = $request->getParam('url');

        if (empty($url)) {
            throw new UserException('Url parameter is required');
        }

        $validator = new UrlValidator();

        if (!$validator->validate($url)) {
            throw new UserException($validator->getFirstErrorMessage());
        }

        $parsedItems = (new HtmlParser())->parseUrl($url);
        $names = ArrayHelper::getColumn($parsedItems, 'name');

        $output = 'Count: ' . count($parsedItems) . PHP_EOL;
        $output .= 'Names: ' . implode(', ', $names) . PHP_EOL;

        return new Response(['output' => $output]);
    }
}