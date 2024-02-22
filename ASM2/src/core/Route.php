<?php
namespace App\core;

use App\core\Request;
use App\core\exception\NotFoundException;

class Route{

    private static $instance;

    public array $routes;

    public Request $request;

    public function __construct()
    {
        $this->request = new Request;
    }

    public static function getInstance(): self{
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function register(string $path, $action)
    {
        $this->routes[$path] = $action;
    }

    public function resolve() {
        $route = $this->routes;
        $path = $this->request->getPath();
        $callback = $route[$path] ?? NULL;
    
        if($callback === NULL){
            throw new NotFoundException;
            die;
        }

        if(is_array($callback)) {
            $controller = new $callback[0];
            $method = $callback[1];
            return call_user_func([$controller, $method]);
        }

    }
}