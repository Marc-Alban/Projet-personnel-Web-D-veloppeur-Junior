<?php
declare (strict_types = 1);
session_start();

require_once '../vendor/autoload.php';

use App\Model\Manager\PartenaireManager;
use App\Tools\GestionGlobal;
use App\Tools\Router;

$Router = new Router();
$maSuperGlobale = new GestionGlobal();
$partenaireManager = new PartenaireManager();

/************************************Page Title Session************************************************* */
// $_SESSION['partenaire'] = $partenaireManager->listePartenaire();
$maSuperGlobale->setParamSession('partenaire', $partenaireManager->listePartenaire());
/************************************End Page Title Session************************************************* */
/************************************Instance Router************************************************* */
$Router->action();
/************************************End Instance Router************************************************* */