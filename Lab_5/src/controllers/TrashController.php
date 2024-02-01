<?php

namespace App\controllers;

use App\core\BaseController;

class TrashController extends BaseController{
    
    public function index() {
        $this->setLayout('mainLayout');
        $this->render('trash', ['title' => 'FileMaster' , 'trashActive' => 'active']);
    }
    
}