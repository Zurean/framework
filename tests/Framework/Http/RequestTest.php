<?php

namespace Framework\Http;

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testEmpty(): void
    {
        $request = new Request();

        self::assertEquals([],$request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    public function testQueryParams(): void
    {
        $request = (new Request())
            ->withQueryParams($data = [
                'name' => 'John',
                'age' => 30
            ]);

        self::assertEquals($data, $request->getQueryParams());
        self::assertNull($request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $request = (new Request())
            ->withParsedBody($data = [
                'One' => 'Two'
            ]);

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals($data, $request->getParsedBody());
    }
}
