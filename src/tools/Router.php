<?php

namespace App\Tools;

class Router
{
    private $_url;
    private $_routes = [];
    private $_matches;

    /**
     * Fonction constructeur qui récupère
     * l'url passé en argument
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->_url = $url;
    }

    /**
     * Récupère le chemin dans le routeur
     * et execute
     *
     * @param [type] $route
     * @param [type] $controller
     * @return void
     */
    public function get(string $route, string $controller)
    {
        $route = trim($route, '/');
        $this->_routes[$route] = $controller;
    }

    public function run()
    {
        foreach ($this->_routes as $route => $controller) {
            if ($this->match($this->_url, $route)) {
                return $this->call($controller);
            }
        }
        return $this->error();
    }

    public function match($url, $route)
    {
        $path = preg_replace('#{[a-z]+}#', '([a-z0-9\-]+)\/?', $route);
        if (!preg_match("#^$$path$#", $url, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->_matches = $matches;
        return true;
    }

    public function call($controller)
    {
        $params = explode('@', $controller);
        $controllerName = $params[0] . 'Controller';
        $controllerString = 'App\Controller\\' . $controllerName;
        $controller = new $controllerString;
        return call_user_func_array([$controller, $params[1] . 'Action'], $this->_matches);

    }

    public function error()
    {
        return header("HTTP/1.0 404 Not Found");
    }
}