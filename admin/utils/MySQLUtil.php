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
        //singelton pattern 
        if (self::$conn == NULL) //truy cap bien static
        {
            echo 'Tao ket noi moi <br>';
            $this->connectDB();
        }else {
            echo 'Lay ket noi cu <br>';
            self::$conn;
        }
    }

    public function __destruct() {
        $this->servername = "";
        $this->username = "";
        $this->password = "";
        $this->dbname = "";
        self::$conn = NULL;
    }

    public function connectDB() {
        try {
            self::$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conn;
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    public function disconnectDB() {
        echo 'Ngat ket noi';
        self::$conn = NULL;
    }

}
