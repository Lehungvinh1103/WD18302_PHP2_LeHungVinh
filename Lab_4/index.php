<?php

require_once __DIR__.'/vendor/autoload.php';

use App\core\Route as Router;
use App\controller;
use App\controllers\HomeController;
use App\controllers\ProductsController;
use App\core\Response;

$router = new Router;

$router->register('/trang-admin-ne', [HomeController::class, 'index']);
$router->register('/products', [ProductsController::class, 'list']);
$router->register('/products/add', 'product controller voi phuong add');

try {
    $router->resolve();
} catch(\Exception $e) {
    $res = new Response;
    $res->statusCode(404);
    echo '<h1>'.$e.'</h1>';
}