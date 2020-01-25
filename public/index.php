<?php
declare (strict_types = 1);
session_start();
require_once '../vendor/autoload.php';

use App\Model\Manager\PartenaireManager;
use App\Tools\GestionGlobal;
use App\Tools\Router;
use App\Tools\Token;

$token = new Token();
$Router = new Router();
$maSuperGlobale = new GestionGlobal();
$partenaireManager = new PartenaireManager();

/************************************Page Title Session************************************************* */
// $_SESSION['partenaire'] = $partenaireManager->listePartenaire();
$maSuperGlobale->setParamSession('partenaire', $partenaireManager->listePartenaire());
/************************************End Page Title Session************************************************* */
/************************************Token Session************************************************* */
//$_SESSION['token'] = $token->createSessionToken();
$maSuperGlobale->setParamSession('token', $token->createSessionToken());
/************************************End Token Session************************************************* */
/************************************Instance Router************************************************* */
$Router->action();
/************************************End Instance Router************************************************* */