<?php

namespace App\controllers;

use App\core\BaseController;
use App\models\UserModel;

class TestController extends BaseController{
    
    public function index() {
        $this->setLayout('mainLayout');
        $this->render('test', ['title' => 'FileMaster' , 'trashActive' => 'active']);

    }
    
    public function handleLogin()
    {


    }
}