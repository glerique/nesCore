<?php

use NesCore\Http\Request;
use NesCore\Http\Response;

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();

$content = '<h1>Hello World</h1>';

$response = new Response(content: $content, status: 200, headers: []);

$response->send();
