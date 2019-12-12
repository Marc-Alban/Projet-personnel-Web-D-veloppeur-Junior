<?php

namespace App\Tools;

class Router
{
    private $url;
    private $page;
    private $id;
    private $pageFront;
    private $pageBack;
    private $routes = [];

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->id = $_GET['id'] ?? null;
        $this->page = $_GET['page'] ?? 'home';
        $this->pageFront = ['home', 'article', 'blog', 'page', 'contact', 'newPassword', 'lostPassword', '404'];
        $this->pageBack = ['dashboard', 'table', 'partenaire', 'login', 'graph', 'form'];
    }

    public function get(string $path = null, string $action = null, ?array $datas = null)
    {
        if (in_array($this->page, $this->pageFront) || empty($_GET['page'])) {
            $this->routes[$path] = ['action' => $action, 'data' => $datas];
        }

        if (isset($datas) && !empty($datas) && $datas !== null) {

        }
    }

    //methode facultatif pour le moment !
    // public function post(string $path, string $action)
    // {
    //     $this->routes[$path] = $action;
    // }

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

    private function callController(array $elements, ?array $datas = null)
    {
        var_dump($elements, $datas);
        die();
        $className = 'App\Controller\\' . $elements[0];
        $method = $elements[1];
        $controller = new $className;
        $controller->$method($this->get('', '', [$datas]));
        // if ($_SERVER["REQUEST_METHOD"] === "GET") {
        // } else if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //     $controller->$method($this->post('', '', []));
        // }
    }

}