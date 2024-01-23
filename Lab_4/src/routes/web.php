<?php

use App\core\Route as Router;
use App\controllers\FilesController;
use App\controllers\HomeController;
use App\controllers\TrashController;


$router = new Router;

$router->register('/', [HomeController::class, 'index']);
$router->register('/my-file', [FilesController::class, 'list']);
$router->register('/thung-rac', [TrashController::class, 'index']);


return $router;