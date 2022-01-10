<?php

include_once '../model/UserModel.php';
include_once '../utils/MySQLUtil.php';
include_once '../controller/BaseController.php';
include_once '../utils/DataValidationUtils.php';

class UserController extends BaseController {

    public function __construct($user_action) {
        switch ($user_action) { //$user_action == attribute name trong html (in button)
            //các case === attribute value trong html (in button)
            case 'create':
                $txt_username = $_POST["txt_username"]; //attribute name in usercreatepage.php
                $txt_email = $_POST["txt_email"];
                $txt_password = md5($_POST["txt_password"]);
                $txt_bio = $_POST["txt_bio"];

                $user = new UserModel($txt_username, $txt_email, $txt_password, $txt_bio, "0");

                $this->insertUser($user);
                header('Location: ../controller/UserController.php');
                break;
            case 'postedit':
                $txt_userid = $_POST["txt_userid"];
                $txt_username = $_POST["txt_username"];
                $txt_email = $_POST["txt_email"];
                $txt_password = md5($_POST["txt_password"]);
                $txt_bio = $_POST["txt_bio"];
                $user = new UserModel($txt_username, $txt_email, $txt_password, $txt_bio, $txt_userid);

                $this->editUser($user);
                header('Location: ../controller/UserController.php');
                break;
            case 'getedit':
                $id = $_GET["id"]; //lay ID 
                $user = new UserModel("", "", "", "", $id);
                $data['user_info'] = $this->getUser($user, "id");
                $this->view('usereditpage', $data); //kế thừa lớp view ở BaseController
                break;
            case 'delete':
                $id = $_GET["id"]; //lay ID 
                $user = new UserModel("", "", "", "", $id);
                $data['user_info'] = $this->deleteUser($user, "id");
                header('Location: ../controller/UserController.php');
                break;
            case 'login':
                $txt_email = $_POST["txt_email"];
                $txt_password = md5($_POST["txt_password"]);
                $user = new UserModel("", $txt_email, $txt_password, "", "");                    
                $data = $this->getUser($user, "email");

                if ($data["email"] == $txt_email && $data["userpassword"] == $txt_password) {
                    //session 
                    session_start();
                    $_SESSION["email"] = $txt_email;
                    $_SESSION["isLogin"] == true;
                    header('Location: ../controller/UserController.php');
                } else {
                    header('Location: ../view/login.php');
                }
                break;
            case 'logout':
                session_start();
                session_unset();
                session_destroy();
                header('Location: ../view/login.php');
                break;
            default:
                var_dump($_GET); //
                $user = new UserModel("", "", "", "", 0);
                $data['user_list'] = $this->getAllUser($user);
                $this->view('userlistpage', $data); //kế thừa lớp view ở BaseController
                break;
        }
    }

    public function insertUser($user) {
        $user->insertUser();
    }

    public function editUser($user) {
        $user->updateUser();
    }

    public function deleteUser($user) {
        $user->deleteUser();
    }

    public function getUser($user, $type) {
        if ($type == "id") {
            return $user->getUserByID();
        } else {
            return $user->getUserByEmail();
        }
    }

    public function getAllUser($user) {
        return $user->getAllUser();
    }

}

//------------------------------------------------------------------------------
$user_action = "";
//clear when create user (avoiding to create user twice when reload)
if (isset($_POST['user_action'])) {
    $user_action = $_POST['user_action'];
} else if (isset($_GET['action'])) {
    $user_action = $_GET['action'];
}

//rel to constructor
$userController = new UserController($user_action);

