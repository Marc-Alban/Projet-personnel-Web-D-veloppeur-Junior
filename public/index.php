<?php
require_once '../vendor/autoload.php';
use App\Tools\Router;

//On met un slash pour eviter de se tromper si l'url est vide ..
Router::get('/', 'Index@homeAction');
Router::get('/home', 'Index@homeAction');
Router::get('/home/{id}', 'Index@modalAction');

Router::run();