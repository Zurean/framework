<?php

namespace Framework\Http;

use PHPUnit\Framework\TestCase;

class RequestFactoryTest extends TestCase
{
    public function testFromGlobals(): void
    {
        $request = RequestFactory::fromGlobals(
            $params = ['name' => 'John'],
            $body = ['age' => '30']
        );

        self::assertEquals($params, $request->getQueryParams());
        self::assertEquals($body, $request->getParsedBody());
    }
}