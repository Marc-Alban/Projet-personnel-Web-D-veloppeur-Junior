<?php
declare (strict_types = 1);
session_start();
require_once '../vendor/autoload.php';

// use App\Model\Manager\PartenaireManager;
use App\Tools\Router;
use App\Tools\Token;

// $partenaireManager = new PartenaireManager();
// $_SESSION['partenaire'] = $partenaireManager->listePartenaire();

$token = new Token();
$_SESSION['token'] = $token->createSessionToken();

//$maSuperGlobale = new GestionGlobalPhp();
//$maSuperGlobale->setParamSession('token', $token->createSessionToken());

$Router = new Router();
$Router->action();