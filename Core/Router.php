<?php

namespace Core;

class Router
{
    public $routes = [];

    public function add($method, $uri, $controller, $action)
    {
        $this->routes[] = compact('method', 'uri', 'controller', 'action');
    }

    public function get($uri, $controller, $action)
    {
        $this->add('GET', $uri, $controller, $action);
    }

    public function post($uri, $controller, $action)
    {
        $this->add('POST', $uri, $controller, $action);
    }

    /**
     * @throws \Exception
     */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return $route;
            }
        }
        throw new \Exception('No route defined for this URI.');
    }
}
