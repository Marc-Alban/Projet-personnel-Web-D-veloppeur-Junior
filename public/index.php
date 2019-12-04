<?php
require_once '../vendor/autoload.php';

class Router
{
    private $url;
    private $page;
    private $pageFront = ['home', 'article', 'blog', 'page', 'contact', 'newPassword', 'lostPassword', '404'];
    private $pageBack = ['dashboard', 'table', 'partenaire', 'login', 'graph', 'form'];
    private $routes = [];

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->page = $_GET['page'] ?? '/';
    }

    public function get(string $path, string $action)
    {
        $this->routes['GET'][$path] = $action;
    }

    public function match()
    {
        foreach ($this->routes as $key => $val) {
            foreach ($val as $path => $action) {
                if ($path === $this->url) {
                    $elements = explode('@', $action);
                    $this->callController($elements);
                }
            }
        }
        //header('HTTP/1.0 404 Not Found');
    }

    private function callController(array $elements)
    {
        $className = 'App\Controller\\' . $elements[0];
        $method = $elements[1];
        $controller = new $className;
        $controller->$method();
    }

    public function page()
    {
        if (in_array($this->page, $this->pageFront) || empty($_GET['page'])) {
            $this->page = $this->get('/', 'IndexController@homeRenderAction');
            $this->page = $this->get('/?page=', 'IndexController@errorAction');
            $this->page = $this->get('/?page=home', 'IndexController@homeRenderAction');
            $this->page = $this->get('/?page=blog', 'ArticleController@listePostAction');
            $this->page = $this->get('/?page=article', 'ArticleController@PostAction');
            $this->page = $this->get('/?page=page', 'PageController@pageRenderAction');
            $this->page = $this->get('/?page=newPassword', 'PasswordController@newPassAction');
            $this->page = $this->get('/?page=lostPassword', 'PasswordController@lostPassAction');
        } else if (in_array($this->page, $this->pageBack)) {
            $this->page = $this->get('/?page=dashboard', 'DashboardController@dashboardRenderAction');
            $this->page = $this->get('/?page=table', 'TableController@listeTableAction');
            $this->page = $this->get('/?page=partenaire', 'PartenaireController@createPartenaireAction');
            $this->page = $this->get('/?page=login', 'UserController@loginUserAction');
            $this->page = $this->get('/?page=graph', 'GraphController@graphRenderAction');
            $this->page = $this->get('/?page=form', 'FormController@formAction');
        }

    }

}

$routeur = new Router($_SERVER["REQUEST_URI"]);
$routeur->page();
$routeur->match();