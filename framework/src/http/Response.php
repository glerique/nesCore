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

    public function send(): void
    {
        http_response_code($this->status);

        foreach ($this->headers as $name => $value) {
            header("{$name}: {$value}");
        }

        echo $this->content;
    }
}
