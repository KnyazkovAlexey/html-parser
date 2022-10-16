<?php
require(__DIR__ . '/vendor/autoload.php');

$html = '<!DOCTYPE html><html lang="en"><title>Title</title><body>Hello, world!</body></html>';
$tagsNames = (new \services\parsers\HtmlParser())->parse($html)->getNames();

assert(count($tagsNames) === 4);
assert(in_array('!DOCTYPE', $tagsNames));
assert(in_array('html', $tagsNames));
assert(in_array('title', $tagsNames));
assert(in_array('body', $tagsNames));

echo 'ok' . PHP_EOL;