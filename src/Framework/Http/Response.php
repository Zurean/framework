<?php

namespace Framework\Http;

class Response
{
    private array $headers = [];

    private string $body;

    private int $statusCode;

    private string $reasonPhrase = '';

    private static array $phrases = [
        200 => 'OK',
        301 => 'Moved Permanently',
        400 => 'Bad Request',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error',
    ];

    public function __construct(string $body, int $statusCode = 200)
    {
        $this->body = $body;
        $this->statusCode = $statusCode;
    }


    public function getBody(): string
    {
        return $this->body;
    }

    public function withBody(string $body): self
    {
        $new = clone $this;

        $new->body = $body;

        return $new;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function withStatus(int $code, string $reasonPhrase = ''): self
    {

        $new = clone $this;

        $new->statusCode = $code;
        $new->reasonPhrase = $reasonPhrase;

        return $new;
    }

    public function getReasonPhrase(): string
    {
        if (!$this->reasonPhrase && isset(self::$phrases[$this->statusCode])) {
            $this->reasonPhrase = self::$phrases[$this->statusCode];
        }

        return $this->reasonPhrase;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function hasHeader($header): bool
    {
        return isset($this->headers[$header]);
    }

    public function getHeader($header): ?string
    {
        if (!$this->hasHeader($header)) {
            return null;
        }
        return $this->headers[$header];
    }

    public function withHeader($header, $value): self
    {
        $new = clone $this;

        if ($new->hasHeader($header)) {
            unset($new->headers[$header]);
        }

        $new->headers[$header] = $value;

        return $new;
    }
}