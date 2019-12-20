<?php
declare (strict_types = 1);
session_start();
require_once '../vendor/autoload.php';
use App\Tools\Router;
$Router = new Router();
$Router->action();