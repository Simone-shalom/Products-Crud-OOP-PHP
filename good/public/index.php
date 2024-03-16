<?php

require_once __DIR__ ."/../vendor/autoload.php";

use app\controllers\ProductController;
use app\Router;

$router = new Router();

$router->get("/",[ProductController::class, 'index'] );

