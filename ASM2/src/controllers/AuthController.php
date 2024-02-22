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

                //ma hoa
                $password = md5($password);

                //check email
                $loggedInUser = $user->checkUserEmail($email);
                if (!$loggedInUser) {
                    $this->response->setJsonContent(['success' => false, 'error' => 'Lỗi, email hoặc mật khẩu không đúng'])->send();
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

    public function signUp()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dataPost = $this->request->getBody();                                   

            //validate
            $validate = new Validator($dataPost);
            $validate->validateRequired('username');
            $validate->validateRequired('email');
            $validate->validateEmail('email', 'Email không đúng định dạng!');
            $validate->validateRequired('password', 'Mật khẩu không được để trống!');
            $validate->validateRequired('confirmPassword');
            $validate->validatePassword('password');
            $validate->validateConfirmedPassword('password', 'confirmPassword');


            if ($validate->passes()) {

                $user = new UserModel();
                extract($dataPost);

                $newData = [
                    'username' => $username,
                    'email' => $email,
                    'password' => md5($password)
                ];

                $checkEmail = $user->checkUserEmail($email);
                $checkUsername = $user->checkUsername($username);

                if ($checkUsername) {
                    $this->response->setJsonContent(['success' => false, 'error' => 'Username đã tồn tại!'])->send();
                } elseif ($checkEmail) {
                    $this->response->setJsonContent(['success' => false, 'error' => 'Email đã tồn tại!'])->send();
                } else {
                    $registerUser = $user->addUser($newData);

                    if ($registerUser) {
                        $this->response->setJsonContent(['success' => true, 'user' => $registerUser])->send();
                    }
                }
            } else {
                $errors = $validate->getErrors();
                $this->response->setJsonContent(['success' => false, 'errors' => $errors])->send();
            }
        } else {
            $this->setLayout('loginLayout');
            $this->render('login/signUp', ['title' => 'Đăng ký FileMaster']);
        }
    }

    public function account()
    {
        $this->setLayout('mainLayout');
        $this->render('profile', ['title' => 'Tài khoản']);
    }
}
