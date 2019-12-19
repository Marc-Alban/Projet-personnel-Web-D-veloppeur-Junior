<?php
declare (strict_types = 1);
namespace App\Tools;

class Router
{

    private $id;
    private $action;
    private $page;
    private $pageFront;
    private $pageBack;
    private $controller;
    private $methode;

    public function __construct()
    {
        $this->id = $_GET['id'] ?? null;
        $this->action = $_GET['action'] ?? null;
        $this->page = $_GET['page'] ?? "Home";
        $this->pageFront = ['Home', 'Blog', 'Error'];
        $this->pageBack = ['adminComments', 'adminChapters', 'adminChapter', 'adminWrite', 'login', 'adminProfil'];

    }

    /**
     * Renvoie le bon controller en fonction de la page qui est passé
     *
     * @return string
     */
    public function controller(): string
    {
        if (in_array($this->page, $this->pageFront) || empty($this->page) || !in_array($this->page, $this->pageBack)) {
            return 'App\Controller\FrontendController\\' . $this->page . "Controller";
        } else if (in_array($this->page, $this->pageBack)) {
            return 'App\Controller\BackendController';
        }

    }

    /**
     * Appel le controller et appelle la bonne
     *  méthode sur le controller appelé
     *
     * @return void
     */
    public function call()
    {
        $controllerString = $this->controller();
        $this->controller = new $controllerString();
        $this->methode = $this->page . 'Action';

        var_dump($this->controller->$this->methode());
        die();
        $controllerMethode = $this->controller->$this->methode();
    }

    /**
     * Si il y a des paramètres dans l'url alors
     * on fait un algo pour savoir quoi mettre dans les méthodes
     * comme paramètres
     *
     */
    public function Action()
    {

        if (in_array($this->page, $this->pageFront) || in_array($this->page, $this->pageBack)) {
            if (($this->action === null && $this->id === null) || ($this->action !== null && $this->id !== null || $this->action !== null && $this->id === null)) {
                $this->controller->$this->methode($_SESSION, ['get' => $_GET, 'post' => $_POST, 'files' => $_FILES]);
            } else if ($this->action === null && $this->id !== null) {
                $this->controller->$this->methode($_SESSION, ['post' => $_POST, 'get' => $_GET]);
            }
        } else if (!in_array($this->page, $this->pageFront) || !in_array($this->page, $this->pageBack)) {
            $this->error();
        }
    }

    public function error()
    {
        $this->controller->ErrorAction();
    }

}