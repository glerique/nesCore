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

        if (is_array($handler) === true) {
            [$controller, $method] = $handler;
            $handler = [new $controller(), $method];
        }

        return [$handler, $vars];
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
                $e = new HttpRequestMethodException("The allowed methods are $allowedMethods");
                $e->setStatusCode(405);
                throw $e;
            default:
                $e = new HttpException('Not found');
                $e->setStatusCode(404);
                throw $e;
        }
    }
}
