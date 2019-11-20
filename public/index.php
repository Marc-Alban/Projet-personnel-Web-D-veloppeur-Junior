<?php

require '../vendor/autoload.php';

//Routing
$page = 'home';
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}

//Rendu  du template
$loader = new Twig_Loader_Filesystem('../templates');

$twig = new Twig_Environment($loader, [
    'cache' => false, //'__DIR__/tmp',
]);

switch ($page) {
    case 'home':
        echo $twig->render('Frontend/home.html.twig');
        break;

    case 'contact':
        echo $twig->render('Frontend/contact.html.twig');
        break;

    case 'lostPassword':
        echo $twig->render('Frontend/lost.html.twig');
        break;

    case 'newPassword':
        echo $twig->render('Frontend/newPassword.html.twig');
        break;

    case '':
        echo $twig->render('Frontend/404.html.twig');
        break;

    default:
        header('HTTP/1.0 404 NOT FOUND');
        echo $twig->render('404.html.twig');
        break;
}