<?php

namespace App\controllers;

use App\core\BaseController;
use App\core\Validator;
use App\models\UserModel;

class AuthController extends BaseController
{

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dataPost = $this->request->getBody();

            //validate
            $validate = new Validator($dataPost);
            $validate->validateEmail('email');
            $validate->validateRequired('password');

            //validate == true
            if ($validate->passes()) {
                $user = new UserModel();
                extract($dataPost);

                //check email
                $loggedInUser = $user->checkUser($email);
                if (!$loggedInUser) {
                    $this->response->setJsonContent(['success' => false, 'error' => 'Lỗi đăng nhập!'])->send();
                }

                //check pass
                if ($password === $loggedInUser['password']) {
                    $_SESSION['user'] = $loggedInUser;
                    $this->response->setJsonContent(['success' => true, 'user' => $loggedInUser])->send();
                }
            } else {
                $errors = $validate->getErrors();
                $this->response->setJsonContent(['success' => false, 'errors' => $errors])->send();
            }
        } else {
            $this->setLayout('loginLayout');
            $this->render('login/login', ['title' => 'Đăng nhập FileMaster']);
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        $this->redirect('dang-nhap');
    }
}
