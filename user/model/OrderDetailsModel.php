<?php

include_once '../utils/MySQLUtil.php';

class OrderDetailsModel {

    private $orderID;
    private $productID;
    private $price;
    private $number;

    public function __construct($orderID, $productID, $price, $number) { {
            $this->orderID = $orderID;
            $this->productID = $productID;
            $this->price = $price;
            $this->number = $number;
        }
    }

    public function getOrderID() {
        return $this->orderID;
    }

    public function getProductID() {
        return $this->productID;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getNumber() {
        return $this->number;
    }

    public function setOrderID($orderID): void {
        $this->orderID = $orderID;
    }

    public function setProductID($productID): void {
        $this->productID = $productID;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }

    public function setNumber($number): void {
        $this->number = $number;
    }

    public function createOrderDetail() {
        $myDB = new MySQLUtil();
        $query = "INSERT INTO oder_detail (order_id, product_id, price, number) VALUES (:orderID, :productID, :price, :number)";
        $para = array(":orderID" => $this->getOrderID(), ":productID" => $this->getProductID(), ":price" => $this->getPrice(), ":number" => $this->getNumber());
        $myDB->insertData($query, $para);
        $myDB->disconnectDB();
    }

}
