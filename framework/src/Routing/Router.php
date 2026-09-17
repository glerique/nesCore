<?php

declare(strict_types=1);

namespace NesCore\Routing;

use FastRoute\Dispatcher;
use NesCore\Exception\HttpException;
use NesCore\Exception\HttpRequestMethodException;
use NesCore\Http\Request;

class Router implements RouterInterface
{
    public function __construct(private readonly RouteCollectionProvider $routeCollectionProvider)
    {
    }

    public function dispatch(Request $request): array
    {
        [$handler, $vars] = $this->extractRouteInfo($request);

        [$controller, $method] = $handler;

        return [[new $controller(), $method], $vars];
    }

    private function extractRouteInfo(Request $request): array
    {
        $dispatcher = $this->routeCollectionProvider->getDispatcher();

        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPathInfo()
        );

        switch ($routeInfo[0]) {
            case Dispatcher::FOUND:
                return [$routeInfo[1], $routeInfo[2]];
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = implode(', ', $routeInfo[1]);
                throw new HttpRequestMethodException("The allowed methods are $allowedMethods");
            default:
                throw new HttpException('Not found');
        }
    }
}
