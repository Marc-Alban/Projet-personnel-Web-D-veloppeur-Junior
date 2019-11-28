<?php

namespace App\Router;

class Router
{
    private $routes = [];
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function get(string $path, string $action)
    {
        $this->routes['GET'][$path] = $action;
    }

    public function match()
    {
        foreach ($this->routes as $key => $val) {
            foreach ($val as $path => $action) {
                if ($path === $this->url) {
                    $elements = explode('@', $action);
                    $this->callController($elements);
                }
            }
            header('HTTP/1.0 404 Not Found');
        }
    }

    private function callController(array $elements)
    {
        $className = 'App\Controller\\' . $elements[0];
        $method = $elements[1];
        $controller = new $className;
        $controller->$method();
    }

}