<?php

use App\controllers\AuthController;
use App\core\Route as Router;
use App\controllers\FilesController;
use App\controllers\HomeController;
use App\controllers\SignupController;
use App\controllers\TestController;
use App\controllers\TrashController;



$router = new Router;

$router->register('/', [HomeController::class, 'index']);
$router->register('/my-file', [FilesController::class, 'list']);
$router->register('/thung-rac', [TrashController::class, 'index']);
$router->register('/dang-nhap', [AuthController::class, 'login']);
$router->register('/dang-xuat', [AuthController::class, 'logout']);
$router->register('/dang-ky', [SignupController::class, 'index']);
// $router->register('/test', [TestController::class, 'handleLogin']);





return $router;