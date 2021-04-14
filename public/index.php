<?php

use Framework\Http\RequestFactory;
use Framework\Http\Response;
use Framework\Http\ResponseEmitter;

require '../vendor/autoload.php';

# Initialization

$request = RequestFactory::fromGlobals();

# Action

$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = (new Response('Hello, ' . $name . '!'))
    ->withHeader('X-developer', 'Zurean');

### Sending

(new ResponseEmitter())->emit($response);
