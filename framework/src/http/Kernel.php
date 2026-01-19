<?php

declare(strict_types=1);

namespace NesCore\Http;

use NesCore\Http\Request;
use NesCore\Http\Response;

class Kernel
{
    public function handle(Request $request): Response
    {
        $content = "<h1>Hello, World!</h1>";

        return new Response($content);
    }
}
