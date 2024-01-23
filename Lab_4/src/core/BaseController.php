<?php

namespace App\core;
use App\core\Request;

class BaseController{

    public Request $request;

    public function __construct()
    {
        $this->request = new Request;
    }
}