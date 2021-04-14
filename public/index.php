<?php

use Framework\Http\RequestFactory;
use Framework\Http\Response;
use \Framework\Http\SimpleStream;

require '../vendor/autoload.php';

# Initialization

$request = RequestFactory::fromGlobals();

# Action

$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = (new Response(new SimpleStream('Hello, ' . $name . '!')))
    ->withHeader('X-developer', 'Zurean');

### Sending

header('HTTP/1.0 ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase());
foreach ($response->getHeaders() as $name => $value) {
    header($name . ':' . $value);
}
echo $response->getBody();
