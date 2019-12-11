<?php

namespace App\Tools;

class Router
{
    private $url;
    private $page;
    private $routes = [];

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->page = $_GET['page'] ?? $this->url;
    }

    public function get(string $path, string $action)
    {
        $this->routes[$path] = $action;
    }

    public function match()
    {
        foreach ($this->routes as $key => $val) {
            if ($key === $this->url) {
                $elements = explode('@', $val);
                $this->callController($elements);
            }
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