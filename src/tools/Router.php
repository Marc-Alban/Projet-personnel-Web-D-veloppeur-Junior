<?php
declare (strict_types = 1);

namespace App\Tools;

use App\Controller\HomeController;

class Router
{
    //Les routes dans un tableau vide
    private $routes = [];
    private $params;

    /**
     * Récupère une route et l'insère dans le tableau des routes
     * En index la route, et en valeur le controller
     * @param string $route
     * @param string $controller
     * @return void
     */
    public function url(String $route, String $controller): void
    {
        $route = trim($route, '/');
        $this->routes[$route] = $controller;
    }

    /**
     * Renvoie le resultat de la méthode match
     *
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->routes as $route => $controller) {
            //Si vrai on execute une action qui est une dernière méthode
            if ($this->match($_GET['url'], $route)) {
                return $this->callController($controller);
            }
        }
        return $this->error();
    }

    /**
     * Permet de comparer l'url à la propriété $route
     * Renvoie false si c'est pas bon sinon renvoi true
     * et insere les paramètres dans un tableau
     *
     * @param string $url
     * @param string $route
     * @return void
     */
    private function match(String $url, String $route): bool
    {
        //on doit récupérer si il y a un paramètre après la route {[a-z]+}
        //puis le remplacer par une regex
        $path = preg_replace("#({[a-z]+})#", "([a-z0-9\-]+)\/?", $route);
        //On verifie si le chemin correspons à l'url
        if (!preg_match("#^$path$#", $url, $matches)) {
            return false;
        };
        //On enlève la première ligne du tableau
        array_shift($matches);
        //Si paramètres vide --> = tableau vide
        $this->params = $matches;
        return true;
    }

/**
 * Permet d'appeler un controller
 *
 * @param string $controller
 * @return object
 */
    private function callController(String $controller): ?object
    {
        $params = explode("@", $controller);
        $controllerName = $params[0] . 'Controller';
        $controllerString = 'App\Controller\\' . $controllerName;
        $controller = new $controllerString();
        //Appel d'une méthode en fournissant les paramètres si il y en a
        return call_user_func_array([$controller, $params[1]], $this->params);
    }

    /**
     * La fonction redirectionErreur404() renvoit une véritable erreur 404
     * passée en paramètre.
     *
     * @param : void
     * @return : void
     */
    private function error()
    {
        $error = new HomeController();
        return $error->errorAction();
    }

}