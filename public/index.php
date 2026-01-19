<?php

declare(strict_types=1);

use NesCore\Http\Kernel;
use NesCore\Http\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();


$kernel = new Kernel();
$response = $kernel->handle($request);

$response->send();
