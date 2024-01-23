<?php

namespace App\core;
use App\core\Request;
use App\core\Render;


class BaseController{

    public Request $request;
    public Render $render;

    public function __construct()
    {
        $this->request = new Request;
        $this->render = new Render;
    }

    public function render($view, $params = []) {
        echo $this->render->renderView($view, $params);
    }

    public function setLayout($layout) {
        $this->render->layout = $layout;
    }
}