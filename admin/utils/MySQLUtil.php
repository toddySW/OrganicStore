<?php

class MySQLUtil {
    private $servername; 
    private $username;
    private $password;
    private $dbname;
    //singelnon pattern
    private static $conn;
    
    public function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "organicstore";
        
        if (self::$conn == NULL) {
            echo 'Tao ket noi moi !<br>';
            //
            
        }
    }
}
