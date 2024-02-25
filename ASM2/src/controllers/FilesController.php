<?php

namespace App\controllers;

use App\core\BaseController;
use App\core\Response;
use App\models\FileModel as ModelsFileModel;
use DateTime;

class FilesController extends BaseController
{

    public function list()
    {
        if(isset($_SESSION['user'])){
            $user_id = $_SESSION['user']['user_id'];

        $fileModel = new ModelsFileModel;

        $dataFile =  $fileModel->getAllFileBy_user($user_id);

        $this->setLayout('mainLayout');
        $this->render('myFile', ['title' => 'My file', 'fileActive' => 'active', 'dataFile' => $dataFile]);
        }else {
            $this->redirect('dang-nhap');
        }
        
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
                            $flag = true;
                        }
                    } else {
                        $this->redirect('my-file');
                    }
                }
                if ($flag) {
                    $response = new Response();
                    $response->setJsonContent([
                        'status' => 'success'
                    ])->send();
                }
            } else {
                $this->redirect($this->getReferer());
            }
        }
    }

    public function downloadFile()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $file_name = $_POST['file_name'];
            $file_id = $_POST['file_id'];

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
                $fileModel = new ModelsFileModel();
                $fileModel->updateDownloadCount($file_id);
                readfile($filePath);

                exit;
            } else {
                // echo "không";
            }
        }
    }

    public function moveToBin()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $file_id = $_POST['file_id'];

            $dataUpdate = [
                'is_recycle' => 1
            ];

            $fileModel = new ModelsFileModel();

            $updateFile = $fileModel->removeToBin($file_id, $dataUpdate);

            if ($updateFile) {
                $this->redirect($this->getReferer());
            }
        }
    }

    public function renameFile()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            date_default_timezone_set("Asia/Ho_Chi_Minh");

            $file_id = $_POST['file_id'];
            $file_ex = $_POST['file_ex'];
            $file_name = $_POST['file_name'."_$file_id"];
            $old_file_name = $_POST['old_file_name'];
            $file_rename = $file_name . '.' . $file_ex;
            $updated_at = date("Y-m-d H:i:s");
            $dataUpdate = [
                'file_name' => $file_rename,
                'updated_at' => $updated_at
            ];

            $fileModel = new ModelsFileModel();

            $updateFile = $fileModel->rename($file_id, $dataUpdate);

            if ($updateFile) {

                $uploadsDirectory = 'public/uploads/';

                $old_FilePath = $uploadsDirectory . $old_file_name;
                $new_FilePath = $uploadsDirectory . $file_rename;

                if (file_exists($old_FilePath)) {
                    // Tiến hành rename file
                    if (rename($old_FilePath, $new_FilePath)) {
                        $this->redirect($this->getReferer());
                    } else {
                        echo 'Không thể rename file.';
                    }
                } else {
                    echo 'File cũ không tồn tại.';
                }
                // $this->redirect($this->getReferer());
                
            }
        }
    }
}

