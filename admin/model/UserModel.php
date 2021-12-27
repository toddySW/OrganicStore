<?php

/**
 * Description of User
 *
 * @author User
 */
include_once '../utils/MySQLUtil.php';

class UserModel {

    //put your code here
    private $userID;
    private $username;
    private $email;
    private $password;
    private $bio;

//    private $avatar;
    //constructor function 
    public function __construct($usrname, $usremail, $usrpassword, $usrbio, $usrid) {
        $this->username = $usrname;
        $this->email = $usremail;
        $this->password = $usrpassword;
        $this->bio = $usrbio;
        $this->userID= $usrid;
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

    public function getUserID() {
        return $this->userID;
    }
    
//    public function setAvatar($avatar): void {
//        $this->avatar = $avatar;
//    }
//    
//    
    //------------------------------------------
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

        $query = "UPDATE user SET username=:username, userpassword=:userpassword, bio=:bio WHERE ID=:ID";
        $para = array(":username" => $this->getUsername(), ":userpassword" => $this->getPassword(), ":bio" => $this->getBio(), ":ID"=>$this->getUserID());
        $myDB->updateData($query, $para);
        $myDB->disconnectDB();
    }
    
    public function deleteUser() {
        $myDB = new MySQLUtil();

        $query = "DELETE FROM user WHERE ID=:ID";
        $para = array(":ID"=>$this->getUserID());
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

    public function getUserByID() {
        $data = NULL;
        $myDB = new MySQLUtil();
        $query = "SELECT ID, username, email, userpassword, bio FROM user WHERE ID=:ID";
        $para = array(":ID" => $this->getUserID());
        $data = $myDB->getData($query, $para);
        $myDB->disconnectDB();
        return $data;
    }
    
    public function getUserByEmail() {
        $data = NULL;
        $myDB = new MySQLUtil();
        $query = "SELECT ID, username, email, userpassword, bio FROM user WHERE email=:email";
        $para = array(":email" => $this->getEmail());
        $data = $myDB->getData($query, $para);
        $myDB->disconnectDB();
        return $data;
        
    }

}
