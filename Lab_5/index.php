<?php

require_once __DIR__.'/vendor/autoload.php';
session_start();

use App\controller;
use App\core\Response;
use App\core\Render;

require_once __DIR__ . '/src/routes/web.php';

try {
    $router->resolve();
} catch(\Exception $e) {
    $res = new Response;
    $render = new Render;
    $res->statusCode(404);
    $render->layout = 'mainLayout';
    echo $render->renderView('404');
}