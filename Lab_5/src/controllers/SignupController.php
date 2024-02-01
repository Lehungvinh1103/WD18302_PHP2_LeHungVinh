<?php

namespace App\controllers;

use App\core\BaseController;

class SignupController extends BaseController{
    
    public function index() {
        $this->setLayout('loginLayout');
        $this->render('login/signUp', ['title' => 'Đăng ký FileMaster']);
    }
    
}