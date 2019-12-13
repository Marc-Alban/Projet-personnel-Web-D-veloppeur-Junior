<?php

namespace App\Tools;

class Router
{
    private static $_routes = [];
    private static $_matches;
    public static function get($route, $controller)
    {
        $route = trim($route, '/');
        self::$_routes[$route] = $controller;
    }

    public static function run()
    {
        foreach (self::$_routes as $route => $controller) {
            if (self::match($_GET['url'], $route)) {
                return self::call($controller);
            }
        }
        return self::error();
    }

    public static function match($url, $route)
    {
        $path = preg_replace('#{[a-z]+}#', '([a-z0-9\-]+)\/?', $route);
        if (!preg_match("#^$$path$#", $url, $matches)) {
            return false;
        }
        array_shift($matches);
        self::$_matches = $matches;
        return true;
    }

    public static function call($controller)
    {
        $params = explode('@', $controller);
        $controllerName = $params[0] . 'Controller';
        $controllerString = 'App\Controller\\' . $controllerName;
        $controller = new $controllerString;
        return call_user_func_array([$controller, $params[1] . 'Action'], self::$_matches);

    }

    public static function error()
    {
        header("HTTP/1.0 404 Not Found");
    }
}