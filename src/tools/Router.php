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

    //get(home,indexController);
    public function get(string $path = null, string $action = null, ?array $data = null)
    {
        //$this->routes['home'] = indexController
        $this->routes[$path] = $action;

        if (isset($data)) {
            if($_Get)
        }
    }

    public function post(string $path, string $action)
    {
        $this->routes[$path] = $action;
    }

    public function match()
    {
        foreach ($this->routes as $key => $val) {
            var_dump($this->url, $this->routes);
            die();
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
        if (isset($_GET)) {
            $controller->$method($this->get('', '', []));
        } else if ($_POST) {
            $controller->$method($this->post('', '', [] ));
        }
    }

}