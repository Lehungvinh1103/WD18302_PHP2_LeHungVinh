<?php

namespace App\controllers;

use App\core\BaseController;

class HomeController extends BaseController{
    
    public function index() {
        $this->setLayout('mainLayout');
        $this->render('home', ['title' => 'FileMaster', 'homeActive' => 'active']);
    }
    
}