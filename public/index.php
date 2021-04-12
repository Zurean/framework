<?php

use Framework\Http\Request;

require '../vendor/autoload.php';

# Initialization

$request = (new Request())
    ->withQueryParams($_GET)
    ->withParsedBody($_POST);

# Action

$name = $request->getQueryParams()['name'] ?? 'Guest';
header('X-developer: Zurean');
echo 'Hello, ' . $name . '!';
