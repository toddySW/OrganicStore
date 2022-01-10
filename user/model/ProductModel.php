<?php

include_once '../utils/MySQLUtil.php';

class ProductModel {

    private $id;
    private $name;
    private $image;
    private $price;
    private $quantity;
    private $number;

    public function __construct($id, $name, $image, $price, $quantity, $number) { {
            $this->id = $id;
            $this->name = $name;
            $this->image = $image;
            $this->price = $price;
            $this->quantity = $quantity;
            $this->number = $number;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getImage() {
        return $this->image;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setImage($image): void {
        $this->image = $image;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity): void {
        $this->quantity = $quantity;
    }

    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number): void {
        $this->number = $number;
    }

    //--------------------------------------
    public function getAllProduct() {
        $data = NULL;
        $myDB = new MySQLUtil();
        $query = "SELECT id, name, image, price, quantity FROM product";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }

    public function updateCart($id, $quantity) {
        $myDB = new MySQLUtil();
        $query = "UPDATE product SET quantity=:quantity WHERE id=:id";
        $para = array(":id" => $this->getId(), ":quantity" => $this->getQuantity());
        $myDB->updateData($query, $para);
        $myDB->disconnectDB();
    }

    public function getProductByID($id) {
        $myDB = new MySQLUtil();
        $query = "SELECT id, name, image, price, quantity FROM product WHERE id=:id";
        $para = array(":id" => $id);
        $data = $myDB->getData($query, $para);
        $myDB->disconnectDB();
        return $data;
    }

    public function getAllProductLimit($limit, $page) {
        $data = NULL;
        $myDB = new MySQLUtil();
        $query = "SELECT * FROM product ORDER BY id ASC LIMIT " . $limit . " OFFSET " . $page;
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }

}
