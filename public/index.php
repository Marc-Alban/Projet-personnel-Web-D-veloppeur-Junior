<?php

require_once '../vendor/autoload.php';

use App\Tools\Router;

$id = $_GET['id'] ?? null;
$page = $_GET['page'] ?? 'home';
$pageFront = ['home', 'article', 'blog', 'page', 'contact', 'newPassword', 'lostPassword', '404'];
$pageBack = ['dashboard', 'table', 'partenaire', 'login', 'graph', 'form'];

$routeur = new Router($_SERVER["REQUEST_URI"]);

if (in_array($page, $pageFront) || empty($_GET['page'])) {
    $routeur->get('/', "IndexController@homeRenderAction");
    $routeur->get('/?page=', 'IndexController@errorAction');
    $routeur->get('/?page=home', "IndexController@homeRenderAction, ['id' => $id]");
    $routeur->get('/?page=blog', 'ArticleController@listsArticlesAction');
    $routeur->get('/?page=article', 'ArticleController@postAction');
    $routeur->post('/?page=page', 'PageController@pageRenderAction');
    $routeur->get('/?page=contact', 'ContactController@contactRenderAction');
    $routeur->get('/?page=newPassword', 'PasswordController@newPassAction');
    $routeur->get('/?page=lostPassword', 'PasswordController@lostPassAction');
} else if (in_array($page, $pageBack)) {
    $routeur->get('/?page=dashboard', 'DashboardController@dashboardRenderAction');
    $routeur->get('/?page=table', 'TableController@listeTableAction');
    $routeur->post('/?page=partenaire', 'PartenaireController@createPartenaireAction');
    $routeur->post('/?page=login', 'UserController@loginUserAction');
    $routeur->post('/?page=graph', 'GraphController@graphRenderAction');
    $routeur->post('/?page=form', 'FormController@formAction');
}
header('HTTP/1.0 404 Not Found');
$routeur->match();