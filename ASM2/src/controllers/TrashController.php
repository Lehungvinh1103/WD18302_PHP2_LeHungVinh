<?php

namespace App\controllers;

use App\core\BaseController;
use App\core\Response;
use App\models\FileModel;

class TrashController extends BaseController
{

    public function index()
    {
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['user_id'];
            $fileModel = new FileModel();
            $deletedFile = $fileModel->listFileInTrash($user_id);
            $this->setLayout('mainLayout');
            $this->render('trash', ['title' => 'Recycle bin', 'trashActive' => 'active', 'deletedData' => $deletedFile]);
        }else {
            $this->redirect('dang-nhap');
        }
    }

    public function restoreFile()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $file_id = $_POST['file_id'];

            $dataUpdate = [
                'is_recycle' => 0
            ];

            $fileModel = new FileModel();

            $updateFile = $fileModel->removeToBin($file_id, $dataUpdate);
            if ($updateFile) {
                $this->redirect('/thung-rac');
            }
        }
    }

    public function deleteFile()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $file_id = $_POST['file_id'];

            $fileModel = new FileModel();

            $updateFile = $fileModel->deleteForever($file_id);
            if ($updateFile) {
                $response = new Response();
                $response->setJsonContent([
                    'status' => 'success'
                ])->send();
                // $this->redirect($this->getReferer());

            }
        }
    }
}
