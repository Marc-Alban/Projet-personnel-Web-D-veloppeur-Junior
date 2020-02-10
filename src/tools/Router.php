<?php
declare (strict_types = 1);
namespace App\Tools;

use App\Controller\FrontendController\HomeController;

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
        $this->page = $_GET['p'] ?? "home";
        $this->pageMaj = ucfirst($this->page);
        $this->pageFront = ['Home', 'Article', 'ListesArticles', 'Contact', 'Page', 'NewPassword', 'LostPassword'];
        $this->pageBack = ['Dashboard', 'Form', 'Graph', 'Partenaire', 'Table', 'User', 'Password'];
        $this->home = new HomeController;
    }
/************************************Controller************************************************* */
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
/************************************End Controller************************************************* */
/************************************Call Function With Controller************************************************* */
    /**
     * Appel le controller et appelle la bonne
     *  méthode sur le controller appelé
     *
     * @return array
     */
    public function call(array $datas): ?array
    {
        $controllerString = $this->controller();
        $controller = new $controllerString();
        $methode = $this->pageMaj . 'Action';
        return $controller->$methode($datas);
    }
/************************************End Call Function With Controller************************************************* */
/************************************Algo Action************************************************* */
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
                $this->call(['get' => $_GET, 'post' => $_POST, 'files' => $_FILES, 'session' => $_SESSION]);
            } else if ($this->action === null && $this->id !== null) {
                $this->call(['post' => $_POST, 'get' => $_GET, 'session' => $_SESSION]);
            }
        } else if (!in_array($this->pageMaj, $this->pageFront) || !in_array($this->pageMaj, $this->pageBack)) {
            $this->error();
        }
    }
/************************************End Algo Action************************************************* */
/************************************Return Error Action************************************************* */
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
/************************************End Return Error Action************************************************ */
}