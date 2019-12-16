<?php
require_once '../vendor/autoload.php';
use App\Tools\Router;
$Router = new Router($_SERVER["REQUEST_URI"]);
// var_dump($_GET);
// die();
$Router->get('/', "Index@home");
$Router->get('/home', "Index@home");
$Router->get('/home/{id}', "Index@home");
//Router->get('/home/{id}/{}', "Article@post");--> deuxième paramètres

$Router->run();