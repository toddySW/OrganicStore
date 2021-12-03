<?php

include_once '../model/UserModel.php';

//hàm kiểm tra user có tồn tại hay không?
function isExistUser($email, $users = array()) {
    $isExist = false;
    foreach ($users as $user) {
        if ($user->getEmail() == $email) {
            $isExist = true;
            break;
        }
    }
    return $isExist;
}

//Lấy dữ liệu từ người dùng nhập từ form 
//Pthức truyền dữ liệu nhập từ user vô DB : should use POST
$txt_username = $_POST["txt_username"];
$txt_email = $_POST["txt_email"];
$txt_password = $_POST["txt_password"];
$txt_bio = $_POST["txt_bio"];
$file_avatar = $_POST["file_avatar"];

//Khởi tạo mảng
//mảng --> đối tượng
$user_01 = new UserModel("toduy", "toduy@gmail.com", "12345", "listening", "images/avar.jpg");
$arr_users = array();
array_push($arr_users, $user_01);
//var_dump($arr_users);


//excute function isExistUser()
$isUser = isExistUser($txt_email, $arr_users);
if ($isUser) {
    //chuyển trang trong php
    header("Location: ../view/usereditpage.php?email=" . $txt_email);
    
} else {
   header("Location: ../view/userlistpage.php");
}