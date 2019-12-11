<?php

require_once '../vendor/autoload.php';

use App\Tools\Router;

$pageFront = ['home', 'article', 'blog', 'page', 'contact', 'newPassword', 'lostPassword', '404'];
$pageBack = ['dashboard', 'table', 'partenaire', 'login', 'graph', 'form'];

$routeur = new Router($_SERVER["REQUEST_URI"]);
$routeur->get('/', 'IndexController@homeRenderAction', $_GET, ['id', 'code']); //basic
if (in_array($routeur->page, $pageFront) || empty($_GET['page'])) {
    $routeur->get('/', 'IndexController@homeRenderAction');
    $routeur->get('/?page=', 'IndexController@errorAction');
    $routeur->get('/?page=home', 'IndexController@homeRenderAction');
    $routeur->get('/?page=blog', 'ArticleController@listsArticlesAction');
    $routeur->get('/?page=article', 'ArticleController@postAction');
    $routeur->get('/?page=page', 'PageController@pageRenderAction');
    $routeur->get('/?page=contact', 'ContactController@contactRenderAction');
    $routeur->get('/?page=newPassword', 'PasswordController@newPassAction');
    $routeur->get('/?page=lostPassword', 'PasswordController@lostPassAction');
} else if (in_array($routeur->page, $pageBack)) {
    $routeur->get('/?page=dashboard', 'DashboardController@dashboardRenderAction');
    $routeur->get('/?page=table', 'TableController@listeTableAction');
    $routeur->get('/?page=partenaire', 'PartenaireController@createPartenaireAction');
    $routeur->get('/?page=login', 'UserController@loginUserAction');
    $routeur->get('/?page=graph', 'GraphController@graphRenderAction');
    $routeur->get('/?page=form', 'FormController@formAction');
}
header('HTTP/1.0 404 Not Found');
$routeur->match();