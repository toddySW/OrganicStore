<?php
include_once '../utils/MySQLUtil.php';

class OrderModel {
    private $orderID;
    private $amount;
    private $status; 
    private $userID;
    
    public function __construct($orderID, $amount, $status, $userID){
    {
            $this->orderID = $orderID;
            $this->amount = $amount;
            $this->status = $status;
            $this->userID = $userID;
    }
        
    }
    public function getOrderID() {
        return $this->orderID;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function setOrderID($orderID): void {
        $this->orderID = $orderID;
    }

    public function setAmount($amount): void {
        $this->amount = $amount;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

    public function setUserID($userID): void {
        $this->userID = $userID;
    }
    
    public function createOrder() {
        $myDB = new MySQLUtil();
        $query = "INSERT INTO orders (orderID, amount, status, userID) VALUES (:orderID, :amount, :status, :userID)";
        $para = array(":orderID" => $this->getOrderID(), ":amount" => $this->getAmount(), ":status" => "0", ":userID" => $this->getUserID());
        $myDB->insertData($query, $para);
        $myDB->disconnectDB();
    }
    
    public function getMaxOrderID() {
        $data = 0;
        $myDB = new MySQLUtil();
        $query = "SELECT max(id) FROM orders WHERE userID =:userID";
        $para = array (":userID" => $this->getUserID());
        $data = $myDB->getMaxID($query, $para);
        $myDB->disconnectDB();
        if (is_null($data[0]["maxID"])){
            return 0;
        }else {
            return $data[0]["maxID"];
        }
        return $data;
    }

}
