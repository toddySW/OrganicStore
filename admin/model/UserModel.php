<?php

/**
 * Description of User
 *
 * @author User
 */
include_once '../utils/MySQLUtil.php';

class UserModel {

    //put your code here
    private $username;
    private $email;
    private $password;
    private $bio;

//    private $avatar;
    //constructor function 
    public function __construct($usrname, $usremail, $usrpassword, $usrbio) {
        $this->username = $usrname;
        $this->email = $usremail;
        $this->password = $usrpassword;
        $this->bio = $usrbio;
//        $this->avatar = $usravatar;
    }

    //destructor function 
    public function __destruct() {
        $this->username = NULL;
        $this->email = NULL;
        $this->password = NULL;
        $this->bio = NULL;
//        $this->avatar = NULL;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getBio() {
        return $this->bio;
    }

//    public function getAvatar() {
//        return $this->avatar;
//    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setBio($bio): void {
        $this->bio = $bio;
    }

//    public function setAvatar($avatar): void {
//        $this->avatar = $avatar;
//    }
    //----------------------------------------
    //Insert(Add) user -------------------------
    public function insertUser() {
        $myDB = new MySQLUtil();

        $query = "INSERT INTO user (username, email, userpassword, bio) VALUES (:username, :email, :userpassword, :bio)";
        $para = array(":username" => $this->getUsername(), ":email" => $this->getEmail(), ":userpassword" => $this->getPassword(), ":bio" => $this->getBio());
        $myDB->insertData($query, $para);
        $myDB->disconnectDB();
    }
    
    public function updateUser() {
        $myDB = new MySQLUtil();

        $query = "UPDATE user SET username=:username, userpassword=:userpassword, bi0=:bio WHERE email=:enmail";
        $para = array(":username" => $this->getUsername(), ":email" => $this->getEmail(), ":userpassword" => $this->getPassword(), ":bio" => $this->getBio());
        $myDB->updateData($query, $para);
        $myDB->disconnectDB();
    }
    
 
    public function getAllUser() {
        $data = NULL;
        $myDB = new MySQLUtil();
        $query = "SELECT ID, username, email, userpassword, bio FROM user";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }

}
