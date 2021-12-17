<?php

include_once '../model/UserModel.php';
include_once '../utils/MySQLUtil.php';
include_once '../controller/BaseController.php';

class UserController extends BaseController {

    public function insertUser($user) {
        $user->insertUser();
        header('Location: ../controller/UserController.php');
    }

    public function updateUser($user) {
        //xu ly sau
        $user->updateUser();
        header('Location: ../view/userlistpage.php');
    }

    public function getAllUser($user) {
        $data['user_list'] = $user->getAllUser();
        $this->view('userlistpage', $data); //kế thừa lớp view ở BaseController
    }

}

//------------------------------------------------------------------------------
$user_action = "";

if (isset($_POST['user_action'])) {
    $user_action = $_POST['user_action'];
}

$userController = new UserController();


switch ($user_action) { //$user_action == attribute name trong html 
    //các case === attribute value trong html
    case 'create':
        $txt_username = $_POST["txt_username"];
        $txt_email = $_POST["txt_email"];
        $txt_password = md5($_POST["txt_password"]);
        $txt_bio = $_POST["txt_bio"];
        
        $user = new UserModel($txt_username, $txt_email, $txt_password, $txt_bio);
     
        $userController->insertUser($user);
        break;
    case 'user_edit':
        $userController->updateUser($user);
        break;
    default:
        $user = new UserModel("", "", "", "");
        $userController->getAllUser($user);
        break;
}


