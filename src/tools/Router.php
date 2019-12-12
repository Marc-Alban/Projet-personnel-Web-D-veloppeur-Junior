<?php

namespace App\Tools;

session_start();

class Router
{
    private $url;
    private $page;
    private $dataGet;
    private $dataPost;
    private $pageFront;
    private $pageBack;
    private $routes = [];

    //Url à passé dès l'instance de la classe
    //$_SERVER["REQUEST_URI"]
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->page = $_GET['page'] ?? 'home';
        $this->pageFront = ['home', 'article', 'blog', 'page', 'contact', 'newPassword', 'lostPassword', '404'];
        $this->pageBack = ['dashboard', 'table', 'partenaire', 'login', 'graph', 'form'];
        $this->dataGet = ['get' => $_GET, $_SESSION];
        $this->dataPost = ['post' => $_POST, $_SESSION];
    }

    /**
     * Définit la route dans l'index.php
     * Contient comme paramètres:
     * le chemin -> $path
     * le controller séparé par un @ de la méthode
     * puis les datas dans un tableau
     *
     * @param string $path
     * @param string $action
     * @param array|null $datas
     * @return void
     */
    public function get(string $path = null, string $action = null, ?array $datas = null)
    {
        if (in_array($this->page, $this->pageFront) || in_array($this->page, $this->pageBack)) {
            $datas = $this->dataGet;
            $this->routes[$path] = ['action' => $action, 'data' => $datas];
        }
    }

    /**
     * Fonction qui récupérer l'url et l'explode
     * en format de tableau. Elle vérifie si le chemin correspond
     * bien à l'url passé dès l'instance. Si ok appel la méthode priver
     * callController
     *
     * @return void
     */
    public function match()
    {
        foreach ($this->routes as $key => $val) {
            if ($key === $this->url) {
                $element = explode('@', $val['action']);
                $datas = $val['data'];
                $this->callController($element, $datas);
            }
        }
    }

    /**
     * fonction ayant deux paramètres:
     * $elements -> le controller et la méthode dans un tableau
     * $datas -> paramètres supplémentaire (id, action etc ... )
     *
     * @param array $elements
     * @param array|null $datas
     * @return void
     */
    private function callController(array $elements, ?array $datas = null)
    {
        $className = 'App\Controller\\' . $elements[0];
        $method = $elements[1];
        $controller = new $className;
        $controller->$method($this->get('', '', [$datas]));
    }

}