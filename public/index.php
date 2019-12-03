<?php
require_once '../vendor/autoload.php';

use App\Router\Router;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('../templates');
$twig = new Environment($loader);
$routeur = new Router($_SERVER["REQUEST_URI"]);

$directory = $_GET['d'] ?? $routeur->get('/', 'IndexController@homeAction');

if ($directory === 'Front') {
    $routeur->get('/', 'IndexController@homeAction');
} else if ($directory === 'Back') {
    $routeur->get('/', 'DashboardController@homeAction');
}

$routeur->match();