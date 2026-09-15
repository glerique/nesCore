<?php

declare(strict_types=1);

use NesCore\Routing\Router;
use NesCore\Http\Kernel;
use NesCore\Http\Request;

define('BASE_PATH', dirname(__DIR__));

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();

$router = new Router();
$kernel = new Kernel($router);
$response = $kernel->handle($request);

$response->send();
