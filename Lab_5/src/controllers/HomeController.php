<?php

namespace App\controllers;

use App\core\BaseController;

class HomeController extends BaseController
{

    public function index()
    {

        if (isset($_SESSION['user'])) {
            $this->setLayout('mainLayout');
            $this->render('home', ['title' => 'FileMaster', 'homeActive' => 'active']);
        } else {
            $this->redirect('dang-nhap');
        }
    }
}
