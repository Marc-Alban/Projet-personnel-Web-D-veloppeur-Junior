<?php
declare (strict_types = 1);
session_start();
require_once '../vendor/autoload.php';
use App\Tools\Router;
use App\Tools\Token;
$token = new Token();
$_SESSION['token'] = $token->createSessionToken();
$Router = new Router();
$Router->action();