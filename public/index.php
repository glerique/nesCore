<?php

declare(strict_types=1);

use NesCore\Routing\RouteCollectionProvider;
use NesCore\Routing\Router;
use NesCore\Http\Kernel;
use NesCore\Http\Request;

define('BASE_PATH', dirname(__DIR__));

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();

$routeCollectionProvider = new RouteCollectionProvider(BASE_PATH . '/routes/web.php');
$router = new Router($routeCollectionProvider);
$kernel = new Kernel($router);
$response = $kernel->handle($request);

$response->send();
