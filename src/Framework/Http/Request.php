<?php

namespace Framework\Http;

class Request
{
    private array $queryParams;

    private ?array $parsedBody;

    public function __construct(array $queryParams = [], ?array $parsedBody = null)
    {
        $this->queryParams = $queryParams;
        $this->parsedBody = $parsedBody;
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function withQueryParams(array $query): self
    {
        $this->queryParams = $query;

        return $this;
    }

    public function getParsedBody(): ?array
    {
        return $this->parsedBody;
    }

    public function withParsedBody(?array $data): self
    {
        $this->parsedBody = $data;

        return $this;
    }
}
