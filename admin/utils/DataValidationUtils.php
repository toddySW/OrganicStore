<?php

class DataValidationUtils {
    function checkEmailValid($email){
        $pattern_email = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
        return (!preg_match($pattern_email, $email)) ? FALSE : TRUE;     
    }
    
    function checkPasswordValid($password){
        $pattern_password = "/^[a-zA-Z-' ]*$/";
        return (!preg_match($pattern_password, $password)) ? FALSE : TRUE;     
    }
}