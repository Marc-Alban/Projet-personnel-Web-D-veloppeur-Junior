<?php
declare (strict_types = 1);
require_once '../vendor/autoload.php';
use App\Tools\Router;
$Router = new Router();

//GET
//On met un slash pour eviter de se tromper si l'url est vide ..
$Router->get('/', 'Home@homeAction');
$Router->get('/home', 'Home@homeAction'); // pas possible avec {$id} --> le faire en js
$Router->get('/listesArticles', 'Article@listesArticlesAction'); //articles
$Router->get('/listesArticles/article/{id}', 'Article@articleAction'); //blog/article/1
$Router->get('/page/{slug}', 'Page@pageRenderAction'); //Slug au lieu de id
$Router->get('/lostPassword', 'Password@lostPassAction');
$Router->get('/newPassword', 'Password@newPassAction');
$Router->get('/contact', 'Contact@contactRenderAction');
//POST->
// $Router->post('/lostPassword/{action}', 'Password@lostPassAction');
// $Router->post('/newPassword/{action}', 'Password@newPassAction');
// $Router->post('/contact/{action}', 'Contact@contactRenderAction');

$Router->run();