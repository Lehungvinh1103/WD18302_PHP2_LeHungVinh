<?php

namespace App\controllers;

use App\core\BaseController;
use App\core\Response;
use App\models\FileModel as ModelsFileModel;

class FilesController extends BaseController
{

    public function list()
    {

        $user_id = $_SESSION['user']['user_id'];

        $fileModel = new ModelsFileModel;

        $dataFile =  $fileModel->getAllFileBy_user($user_id);

        $this->setLayout('mainLayout');
        $this->render('myFile', ['title' => 'File', 'fileActive' => 'active', 'dataFile' => $dataFile]);
    }

    public function addFile()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user_id = $_POST['user_id'];

            if (isset($_FILES['files']['name']) && is_array($_FILES['files']['name'])) {

                $fileCount = count($_FILES['files']['name']);

                for ($i = 0; $i < $fileCount; $i++) {
                    $fileName = $_FILES['files']['name'][$i];
                    $fileSize = $_FILES['files']['size'][$i];

                    $uploadDirectory = "public/uploads/";

                    $newFilePath = $uploadDirectory . $fileName;

                    if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $newFilePath)) {

                        $dataFile = [
                            'user_id' => $user_id,
                            'file_name' => $fileName,
                            'file_size' => $fileSize
                        ];

                        $file = new ModelsFileModel();

                        $addFile = $file->addFile($dataFile);

                        if ($addFile) {
                            $response = new Response();
                            $response->setJsonContent([
                                'status' => 'success'
                            ])->send();
                        }
                    } else {
                        $this->redirect('my-file');
                    }
                }
            } else {
                $this->redirect('my-file');
            }
        }
    }

    public function downloadFile()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $file_name = $_POST['file_name'];

            $filePath = "public/uploads/" . "$file_name";
            if (file_exists($filePath)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filePath));

                // Đọc file và đưa nó ra output
                readfile($filePath);
                exit;
            } else {
                echo "không";
            }
        }
    }

    public function moveToBin(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $file_id = $_POST['file_id'];

            $dataUpdate = [
                'is_recycle' => 1
            ];

            $fileModel = new ModelsFileModel();

            $updateFile = $fileModel->removeToBin($file_id, $dataUpdate);
            
            if($updateFile){
                $this->redirect('/my-file');
            }

        }
    }
}
