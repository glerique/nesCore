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

        // Dispatch a URI, to obtain the route info
        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPathInfo()
        );

        [$status, $handler, $vars] = $routeInfo;

        // Call the handler, provided by the route info, in order to create a Response
        return $handler($vars);
    }
}
