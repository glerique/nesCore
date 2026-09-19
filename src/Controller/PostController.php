<?php

declare(strict_types=1);

namespace App\Controller;

use NesCore\Http\Response;

class PostController
{
    public function show(string $id): Response
    {
        $content = "<h1>This is post $id</h1>";

        return new Response($content);
    }
}
