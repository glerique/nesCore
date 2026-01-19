<?php

declare(strict_types=1);

namespace NesCore\Http;

class Response
{
    /**
     * @param array<string, string> $headers
     */
    public function __construct(
        private ?string $content = '',
        private int $status = 200,
        private array $headers = []
    ) {
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return array<string, string>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function send(): void
    {
        echo $this->content;
    }
}
