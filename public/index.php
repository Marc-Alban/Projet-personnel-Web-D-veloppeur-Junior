<?php
require_once '../vendor/autoload.php';
use App\Tools\Router;
var_dump($_GET);
Router::get('/', "Index@home");
Router::get('/home', "Index@home");
Router::get('/home/{id}', "Index@modal");

Router::run();