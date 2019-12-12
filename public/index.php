<?php

require_once '../vendor/autoload.php';

use App\Tools\Router;

//Front
$routeur = new Router($_SERVER["REQUEST_URI"]);

$routeur->get('/', "IndexController@homeRenderAction");
$routeur->get('/?page=', 'IndexController@errorAction');
$routeur->get('/?page=home', "IndexController@homeRenderAction", ['id', 'action']);
$routeur->get('/?page=blog', 'ArticleController@listsArticlesAction');
$routeur->get('/?page=article', 'ArticleController@postAction');
//$routeur->post('/?page=page', 'PageController@pageRenderAction');
$routeur->get('/?page=contact', 'ContactController@contactRenderAction');
$routeur->get('/?page=newPassword', 'PasswordController@newPassAction');
$routeur->get('/?page=lostPassword', 'PasswordController@lostPassAction');
//Back
$routeur->get('/?page=dashboard', 'DashboardController@dashboardRenderAction');
$routeur->get('/?page=table', 'TableController@listeTableAction');
// $routeur->post('/?page=partenaire', 'PartenaireController@createPartenaireAction');
// $routeur->post('/?page=login', 'UserController@loginUserAction');
// $routeur->post('/?page=graph', 'GraphController@graphRenderAction');
// $routeur->post('/?page=form', 'FormController@formAction');

$routeur->match();