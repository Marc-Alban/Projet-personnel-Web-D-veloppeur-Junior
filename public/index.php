<?php
require_once '../vendor/autoload.php';
use App\Tools\Router;
Router::get('/', "Index@home");
Router::get('/home', "Index@home");
Router::get('/home/{id}', "Index@modal");
//Router::get('/home/{id}/{}', "Article@post");--> deuxième paramètres

Router::run();