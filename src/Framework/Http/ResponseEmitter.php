<?php

namespace Framework\Http;

use Psr\Http\Message\ResponseInterface;

class ResponseEmitter
{
    public function emit(ResponseInterface $response): void
    {
        header('HTTP/1.0 ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase());
        foreach ($response->getHeaders() as $name => $value) {
            header($name . ':' . $value);
        }
        echo $response->getBody();
    }
}
