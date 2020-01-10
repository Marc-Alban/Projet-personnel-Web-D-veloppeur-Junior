<?php
declare (strict_types = 1);
session_start();
require_once '../vendor/autoload.php';
use App\Controller\BackendController\UserController;
use App\Tools\Router;
use App\Tools\Token;

$user = new UserController();
$_SESSION['user'] = $user->getUserInfosForm();

$token = new Token();
$_SESSION['token'] = $token->createSessionToken();

$Router = new Router();
$Router->action();