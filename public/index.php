<?php
declare (strict_types = 1);
session_start();

require_once '../vendor/autoload.php';
require_once '../src/Tools/ReCaptcha/autoload.php';

use App\Model\Manager\PageManager;
use App\Model\Manager\PartenaireManager;
use App\Tools\GestionGlobal;
use App\Tools\Router;

$Router = new Router();
$maSuperGlobale = new GestionGlobal();
$partenaireManager = new PartenaireManager();
$pageManager = new PageManager();

/************************************Paramètre Session************************************************* */
$maSuperGlobale->setParamSession('partenaire', $partenaireManager->listePartenaire());
/************************************End Paramètre Session************************************************* */
/************************************Page Title Session************************************************* */
$maSuperGlobale->setParamSession('titlePageLink', $pageManager->getTitleData('link', null));
$maSuperGlobale->setParamSession('titlePage', $pageManager->getTitleData(null, 'nav'));
/************************************End Page Title Session************************************************* */
/************************************Instance Router************************************************* */
$Router->action();
/************************************End Instance Router************************************************* */