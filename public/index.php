<?php
declare (strict_types = 1);
require_once '../vendor/autoload.php';
use App\Tools\Router;

$Router = new Router();
$Router->call();

//GET
//On met un slash pour eviter de se tromper si l'url est vide ..
// $Router->url('/', 'Home@homeAction');
// $Router->url('/home', 'Home@homeAction'); // pas possible avec {$id} --> le faire en js
// $Router->url('/listesArticles', 'Article@listesArticlesAction'); //articles
// $Router->url('/listesArticles/{article}/{id}', 'Article@articleAction'); //blog/article/1
// $Router->url('/page/{slug}', 'Page@pageRenderAction'); //Slug au lieu de id
// $Router->url('/lostPassword', 'Password@lostPassAction');
// $Router->url('/newPassword', 'Password@newPassAction');
// $Router->url('/contact', 'Contact@contactRenderAction');
//POST->
// $Router->post('/lostPassword/{action}', 'Password@lostPassAction');
// $Router->post('/newPassword/{action}', 'Password@newPassAction');
// $Router->post('/contact/{action}', 'Contact@contactRenderAction');
// $Router->run();