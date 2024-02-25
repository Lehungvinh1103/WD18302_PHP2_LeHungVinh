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
        if (isset($_SESSION['user'])) {

            $user_id = $_SESSION['user']['user_id'];
            $userModel = new UserModel();
            $dataUser =  $userModel->getUserById($user_id);

            $this->setLayout('mainLayout');
        $this->render('profile', ['title' => 'Tài khoản', 'dataUser' => $dataUser]);
        } else {
            $this->redirect('dang-nhap');
        }
        
    }

    public function updateInfo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dataPost = $this->request->getBody();                                   

                $user = new UserModel();
                extract($dataPost);
                ($gender == 'Male') ? $gender = 0 : $gender = 1;

                $newData = [
                    'fullname' => $fullname,
                    'gender' => $gender,
                    'phone' => $phone,
                ];

                $result = $user->updateUser($email, $newData);

                if ($result) {
                    $this->response->setJsonContent(['status' => 'success'])->send();
                }
        } 
        
    }

    public function updatePass()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dataPost = $this->request->getBody();                                   

                $user = new UserModel();
                extract($dataPost);
                $id = $user_id;
                
                $checkPass = $user->getUserById($id);

                if($checkPass['password'] === md5($current_pass)){
                    $newData = [
                        'password' => md5($new_pass),
                    ];

                    $result = $user->changePass($id, $newData);

                    if ($result) {
                        $this->response->setJsonContent(['status' => 'success'])->send();
                    }
                }else{
                    $this->response->setJsonContent(['status' => 'error', 'error' => 'Mật khẫu hiện tại không chính xác!'])->send();
                }
                

                
        } 
    
    }
}
