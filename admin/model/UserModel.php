<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of User
 *
 * @author User
 */
class User {

    //put your code here
    private $username;
    private $email;
    private $password;
    private $bio;
    private $avatar;

    //constructor function 
    public function __construct($usrname, $usremail, $usrpassword, $usrbio, $usravatar) {
        $this->username = $usrname;
        $this->email = $usremail;
        $this->password = $usrpassword;
        $this->bio = $usrbio;
        $this->avatar = $usravatar;
    }

    //destructor function 
    public function __destruct() {
        $this->username = NULL;
        $this->email = NULL;
        $this->password = NULL;
        $this->bio = NULL;
        $this->avatar = NULL;
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

    public function getAvatar() {
        return $this->avatar;
    }

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

    public function setAvatar($avatar): void {
        $this->avatar = $avatar;
    }

}
