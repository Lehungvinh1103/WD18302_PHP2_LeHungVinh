<?php
include 'model.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $user = get_user($email);
    if(empty($user)){
        $mess = "Không tìm thấy tên người dùng.";
    }
}

include 'view.php'; 
?>