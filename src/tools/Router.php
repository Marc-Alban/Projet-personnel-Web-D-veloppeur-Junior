<?php

namespace App\Tools;

class Router
{
    private static $_routes = [];
    public static function get($route, $controller)
    {
        self::$_routes[$route] = $controller;
    }

    public static function run()
    {

    }
}