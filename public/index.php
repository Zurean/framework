<?php

use Framework\Http\RequestFactory;

require '../vendor/autoload.php';

# Initialization

$request = RequestFactory::fromGlobals();

# Action

$name = $request->getQueryParams()['name'] ?? 'Guest';
header('X-developer: Zurean');
echo 'Hello, ' . $name . '!';
