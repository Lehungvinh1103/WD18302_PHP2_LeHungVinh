<?php

namespace App\core;

use App\core\Request;
use App\core\Render;
use App\core\Response;



class BaseController
{

    public Request $request;
    public Render $render;
    public Response $response;

    public function __construct()
    {
        $this->request = new Request;
        $this->render = new Render;
        $this->response = new Response;
    }

    public function render($view, $params = [])
    {
        echo $this->render->renderView($view, $params);
    }

    public function setLayout($layout)
    {
        $this->render->layout = $layout;
    }

    public function redirect($url, $refresh = null)
    {
        header('location:' . $url);
        
    }
}
