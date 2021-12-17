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
        if (self::$conn == NULL) { //truy cap bien static
            $this->connectDB();
        } 
            return self::$conn;
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
        self::$conn = NULL;
    }

    //--------------------------------------------------------------------------
    public function insertData($query, $para = array()) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($para);
    }

    public function getAllData($query) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData($query, $para = array()) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($para);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteData($query, $para = array()) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($para);
        return $stmt->rowCount();
    }

   public function updateData($query, $para = array()) {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($para);
        return $stmt->rowCount();
    }

}
