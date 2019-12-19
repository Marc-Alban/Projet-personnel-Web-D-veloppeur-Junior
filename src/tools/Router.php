<?php
declare (strict_types = 1);
namespace App\Tools;

use App\Controller\FrontendController\HomeController;

session_start();

class Router
{

    private $id;
    private $action;
    private $page;
    private $pageMaj;
    private $pageFront;
    private $pageBack;
    private $home;

    public function __construct()
    {

        $this->id = $_GET['id'] ?? null;
        $this->action = $_GET['action'] ?? null;
        $this->page = $_GET['page'] ?? "home";
        $this->pageMaj = ucfirst($this->page);
        $this->pageFront = ['Home', 'Article', 'ListesArticles', 'Contact', 'Page', 'NewPassword', 'LostPassword'];
        $this->pageBack = ['Dashboard', 'Form', 'Graph', 'Partenaire', 'Table', 'User'];
        $this->home = new HomeController;

    }

    /**
     * Renvoie le bon controller en fonction de la page qui est passé
     *
     * @return string
     */
    public function controller(): string
    {
        if (in_array($this->pageMaj, $this->pageFront) || empty($this->pageMaj) || !in_array($this->pageMaj, $this->pageBack)) {
            return 'App\Controller\FrontendController\\' . $this->pageMaj . "Controller";
        } else if (in_array($this->pageMaj, $this->pageBack)) {
            return 'App\Controller\BackendController\\' . $this->pageMaj . "Controller";
        }

    }

    /**
     * Appel le controller et appelle la bonne
     *  méthode sur le controller appelé
     *
     * @return array
     */
    public function call(array $session, array $datas): ?array
    {
        $controllerString = $this->controller();
        $controller = new $controllerString();
        $methode = $this->pageMaj . 'Action';
        return $controller->$methode($session, $datas);
    }

    /**
     * Si il y a des paramètres dans l'url alors
     * on fait un algo pour savoir quoi mettre dans les méthodes
     * comme paramètres
     *
     */
    public function action(): void
    {
        if (in_array($this->pageMaj, $this->pageFront) || in_array($this->pageMaj, $this->pageBack)) {
            if (($this->action === null && $this->id === null) || ($this->action !== null && $this->id !== null || $this->action !== null && $this->id === null)) {
                $this->call($_SESSION, ['get' => $_GET, 'post' => $_POST, 'files' => $_FILES]);
            } else if ($this->action === null && $this->id !== null) {
                $this->call($_SESSION, ['post' => $_POST, 'get' => $_GET]);
            }
        } else if (!in_array($this->pageMaj, $this->pageFront) || !in_array($this->pageMaj, $this->pageBack)) {
            $this->error();
        }
    }

    /**
     * Renvoie la page 404 si rien n'est trouvée !
     *
     * @return void
     */
    public function error(): void
    {
        $this->home->errorAction();
        exit();
    }

}