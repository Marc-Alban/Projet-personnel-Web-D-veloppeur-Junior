<?php
require_once '../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

//Rendu du template
// define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates/');

$loader = new FilesystemLoader('../templates');
$twig = new Environment($loader);

// $routeur = new Router($_SERVER["REQUEST_URI"]);

// $routeur->get('/', 'IndexController@homeAction');
// $routeur->match();

//Routing
$page = 'home';
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}

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

    case 'createPartenaire':
        echo $twig->render('Backend/partenaire.html.twig');
        break;

    case 'createGraph':
        echo $twig->render('Backend/graph.html.twig');
        break;

    case 'createArticle':
        echo $twig->render('Backend/form.html.twig');
        break;

    case 'updatePage':
        echo $twig->render('Backend/form.html.twig');
        break;

    case 'listeLien':
        echo $twig->render('Backend/table.html.twig');
        break;

    case 'listeArticle':
        echo $twig->render('Backend/table.html.twig');
        break;

    case 'listePage':
        echo $twig->render('Backend/table.html.twig');
        break;

    case 'listeGraphique':
        echo $twig->render('Backend/table.html.twig');
        break;

    case 'loginUser':
        echo $twig->render('Backend/loginUser.html.twig');
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        echo $twig->render('Frontend/404.html.twig');
        break;

}