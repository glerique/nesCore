<?php

declare(strict_types=1);

namespace NesCore\Http;

use NesCore\Http\Request;
use NesCore\Http\Response;
use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request): Response
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) {
            $routeCollector->addRoute('GET', '/', function () {
                $content = '<h1>Hello World</h1>';

                return new Response($content);
            });

            $routeCollector->addRoute('GET', '/posts/{id:\d+}', function ($routeParams) {
                $content = "<h1>This is Post {$routeParams['id']}</h1>";

                return new Response($content);
            });
        });

        /** @var string $method */
        $method = $request->server['REQUEST_METHOD'] ?? 'GET';
        /** @var string $uri */
        $uri = $request->server['REQUEST_URI'] ?? '/';

        $routeInfo = $dispatcher->dispatch($method, $uri);

        [$handler, $vars] = $routeInfo;

        return $handler($vars);
    }
}
