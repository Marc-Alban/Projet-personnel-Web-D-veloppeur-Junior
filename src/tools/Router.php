<?php
declare (strict_types = 1);
namespace App\Tools;

session_start();

class Router
{
    private $id;
    private $action;
    private $page;
    private $pageFront;
    private $pageBack;
    private $controllerName;
    private $controller;
    private $methode;

    public function __contruct()
    {
        $this->id = $_GET['id'] ?? null;
        $this->action = $_GET['action'] ?? null;
        $this->page = $_GET['page'] ?? 'home';
        $this->pageFront = ['home', 'blog', 'error'];
        $this->pageBack = ['adminComments', 'adminChapters', 'adminChapter', 'adminWrite', 'login', 'adminProfil'];
        //var_dump($this->page, $this->pageFront);

    }

    public function controller(): string
    {
        var_dump($this->page, $this->pageFront);
        if (in_array($this->page, $this->pageFront) || empty($this->page) || !in_array($this->page, $this->pageBack)) {
            //var_dump('test');
            //return $this->controllerName = 'App\Controller\FrontendController' . $this->page . "Controller"
        } else if (in_array($this->page, $this->pageBack)) {
            return $this->controllerName = 'App\Controller\BackendController';
        }
        //die();
    }

    public function call()
    {
        $this->controller = new $this->controllerName;
        $this->methode = $this->page . 'Action';
    }

    public function Action()
    {
        if (in_array($this->page, $this->pageFront) || in_array($this->page, $this->pageBack)) {
            if (($this->action === null && $this->id === null) || ($this->action !== null && $this->id !== null || $this->action !== null && $this->id === null)) {
                $this->controller->$this->methode($_SESSION, ['get' => $_GET, 'post' => $_POST, 'files' => $_FILES]);
            } else if ($this->action === null && $this->id !== null) {
                $this->controller->$this->methode($_SESSION, ['post' => $_POST, 'get' => $_GET]);
            }
        }
    }

    public function error()
    {
        $this->controller->errorAction();
    }

}