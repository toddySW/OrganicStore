<?php

include_once '../model/UserModel.php';
include_once '../utils/MySQLUtil.php';
include_once '../controller/BaseController.php';

class UserController extends BaseController {

    public function __construct($user_action) {
        switch ($user_action) { //$user_action == attribute name trong html (in button)
            //các case === attribute value trong html (in button)
            case 'create':
                $txt_username = $_POST["txt_username"];
                $txt_email = $_POST["txt_email"];
                $txt_password = md5($_POST["txt_password"]);
                $txt_bio = $_POST["txt_bio"];

                $user = new UserModel($txt_username, $txt_email, $txt_password, $txt_bio);

                $this->insertUser($user);
                header('Location: ../controller/UserController.php');
                break;
            case 'edit':
                $this->updateUser($user);
//                header('Location: ../view/userlistpage.php');
                break;
            case 'login': //toi day roi ne
                $txt_email = $_POST["txt_email"];
                $txt_password = md5($_POST["txt_password"]);
                
                $user = new UserModel("", $txt_email, $txt_password, "");
                
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
                var_dump($_GET); //getID user to edit
                $user = new UserModel("", "", "", "");
                $this->getAllUser($user);
                break;
        }
    }

    public function insertUser($user) {
        $user->insertUser();
    }

    public function editUser($user) {
        //xu ly sau
        $user->updateUser();
    }

    public function getUser($user, $type) {
        if ($type == "id") {
            return $user->getUserByID();
        }else {
            return $user->getUserByEmail();
        }
    }

    public function getAllUser($user) {
        $data['user_list'] = $user->getAllUser();
        $this->view('userlistpage', $data); //kế thừa lớp view ở BaseController
    }

}

//------------------------------------------------------------------------------
$user_action = "";
//clear when create user (avoiding to create user twice when reload)
if (isset($_POST['user_action'])) {
    $user_action = $_POST['user_action'];
} else if (isset ($_GET['action'])) {
    $user_action = $_GET['action'];
}

//rel to constructor
$userController = new UserController($user_action);


