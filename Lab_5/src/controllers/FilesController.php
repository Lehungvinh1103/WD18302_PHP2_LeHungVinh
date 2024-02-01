<?php

namespace App\controllers;

use App\core\BaseController;

class FilesController extends BaseController {
    
    public function list() {
        $this->setLayout('mainLayout');
        $this->render('myFile', ['title' => 'File', 'fileActive' => 'active']);
    }

}