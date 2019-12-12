<?php

namespace App\Tools;

class Router
{
    private $url;
    private $routes = [];

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function get(string $path = null, string $action = null, ?array $data = null)
    {
        $this->routes[$path][$action] = $action;
        $this->routes[$path][$data] = $data;
    }

    public function post(string $path, string $action)
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
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $controller->$method($this->get('', '', []));
        } else if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $controller->$method($this->post('', '', []));
        }
    }

}