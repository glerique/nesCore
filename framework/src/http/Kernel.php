<?php

declare(strict_types=1);

namespace NesCore\Http;

use NesCore\Http\Request;
use NesCore\Http\Response;
use FastRoute\Dispatcher;
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

        return match ($routeInfo[0]) {
            Dispatcher::NOT_FOUND => new Response('Not Found', 404),
            Dispatcher::METHOD_NOT_ALLOWED => new Response('Method Not Allowed', 405),
            Dispatcher::FOUND => $routeInfo[1]($routeInfo[2]),
        };
    }
}
