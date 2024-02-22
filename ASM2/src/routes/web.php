<?php

use App\controllers\AuthController;
use App\core\Route as Router;
use App\controllers\FilesController;
use App\controllers\HomeController;
use App\controllers\TrashController;



$router = new Router;

$router->register('/', [HomeController::class, 'index']);
$router->register('/my-file', [FilesController::class, 'list']);
$router->register('/addFile', [FilesController::class, 'addFile']);
$router->register('/downloadFile', [FilesController::class, 'downloadFile']);
$router->register('/moveToBin', [FilesController::class, 'moveToBin']);
$router->register('/restoreFile', [TrashController::class, 'restoreFile']);
$router->register('/deleteFile', [TrashController::class, 'deleteFile']);
$router->register('/test', [FilesController::class, 'test']);
$router->register('/tai-khoan', [AuthController::class, 'account']);
$router->register('/thung-rac', [TrashController::class, 'index']);
$router->register('/dang-nhap', [AuthController::class, 'login']);
$router->register('/dang-xuat', [AuthController::class, 'logout']);
$router->register('/dang-ky', [AuthController::class, 'signUp']);


/**
 * Api routes
 */

 $router->register('/api/files/add', [FilesController::class, 'addFile']);


return $router;