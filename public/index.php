<?php
require_once '../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

//Routing
$page = 'home';
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}

//Rend u  du template
$loader = new FilesystemLoader('../templates');
$twig = new Environment($loader, [
    // 'cache' => false, //'__DIR__/tmp',
    // 'charset' => 'utf-8',
]);

switch ($page) {
    // Frontend
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

    case 'nosValeurs':
        echo $twig->render('Frontend/page.html.twig');
        break;

    case 'adresse':
        echo $twig->render('Frontend/page.html.twig');
        break;

    case 'conseilPatrimonial':
        echo $twig->render('Frontend/page.html.twig');
        break;

    case 'conseilEnInvestissementFinancier':
        echo $twig->render('Frontend/page.html.twig');
        break;

    case 'conseilEnInvestissementImmobilier':
        echo $twig->render('Frontend/page.html.twig');
        break;

    case 'AutresSolutionsDinvestissement':
        echo $twig->render('Frontend/page.html.twig');
        break;

    case 'listeDesArticles':
        echo $twig->render('Frontend/blog.html.twig');
        break;

    case 'article':
        echo $twig->render('Frontend/article.html.twig');
        break;

    // Empty
    case '':
        echo $twig->render('Frontend/404.html.twig');
        break;

    // Backend
    case 'dashboard':
        echo $twig->render('Backend/dashboard.html.twig');
        break;

    default:
        echo $twig->render('Frontend/404.html.twig');
        break;
}