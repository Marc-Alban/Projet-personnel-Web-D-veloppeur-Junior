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
     *
     * @param [type] $route
     * @param [type] $controller
     * @return void
     */
    public function get(string $route, string $controller)
    {
        $route = trim($this->_url, '/');
        $this->_routes[$route] = $controller;
    }

    /**
     * Lance la création de l'objet, c'est a dire le bon controller
     * Sinon retourne une erreur
     */
    public function run()
    {
        foreach ($this->_routes as $route => $controller) {
            $trimUrl = trim($this->_url, '/');
            if ($this->match($trimUrl, $route)) {
                return $this->call($controller);
            }
        }
        return $this->error();
    }

    /**
     * Fonction qui permet de récupérer et de tester si il y a
     * des paramètres apres le /.
     *
     * @param [type] $url
     * @param [type] $route
     * @return void
     */
    public function match($url, $route)
    {
        //remplace ce qu'il y a apres le /home/ ... Dans l'url par
        //soit un chiffre ou un text à l'infini.
        $path = preg_replace('{[a-z0-9]+}', '([a-z0-9\-]+)\/?', $route);
        //on verifie s'il y a une regex dans le sujet qui est l'url
        //Et on insert la réponse dans $matches qui est un tableau
        if (preg_match("#^$path$#", $url, $matches)) {
            //Enleve les deux premier element du tableau
            array_shift($matches);
            array_shift($matches);
            //Insertion des paramètres dans $this->_matches
            $this->_matches = $matches;
            return true;
        }
        // produit une erreur si ça n'a pas matché
        return false;

    }

    /**
     * Appelle le bon controlleur et la bonne méthode
     *
     * @param [type] $controller
     * @return void
     */
    public function call($controller)
    {
        $params = explode('@', $controller);
        $controllerName = $params[0] . 'Controller';
        $controllerString = 'App\Controller\\' . $controllerName;
        $controller = new $controllerString;
        return call_user_func_array([$controller, $params[1] . 'Action'], $this->_matches);

    }

    /**
     * Genere une erreur 404
     *
     * @return void
     */
    public function error()
    {
        return header("HTTP/1.0 404 Not Found");
    }
}