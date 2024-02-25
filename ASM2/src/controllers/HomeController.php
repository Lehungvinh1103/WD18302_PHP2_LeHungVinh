<?php

namespace App\controllers;

use App\core\BaseController;
use App\models\FileModel;

class HomeController extends BaseController
{

    public function index()
    {

        if (isset($_SESSION['user'])) {

            $user_id = $_SESSION['user']['user_id'];
            $fileModel = new FileModel();
            $dataFile =  $fileModel->getAllFile_createdAt($user_id);

            $this->setLayout('mainLayout');
            $this->render('home', ['title' => 'File Master', 'homeActive' => 'active', 'dataFile' => $dataFile]);
        } else {
            $this->redirect('dang-nhap');
        }
    }
}
