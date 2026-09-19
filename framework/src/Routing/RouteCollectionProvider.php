<?php

declare(strict_types=1);

namespace NesCore\Routing;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class RouteCollectionProvider
{
    public function __construct(private readonly string $routesFile)
    {
    }

    public function getDispatcher(): Dispatcher
    {
        return simpleDispatcher(function (RouteCollector $routeCollector) {
            $routes = include $this->routesFile;

            foreach ($routes as $route) {
                $routeCollector->addRoute(...$route);
            }
        });
    }
}
