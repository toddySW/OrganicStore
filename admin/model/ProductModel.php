<?php

include_once '../utils/MySQLUtil.php';

class ProductModel {

    private $productID;
    private $name;
    private $image;
    private $price;
    private $quantity;

    public function __construct($image, $name, $price, $quantity, $productID) {
        $this->image = $image;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->productID = $productID;
    }

    public function __destruct() {
        $this->productID = null;
        $this->name = null;
        $this->image = null;
        $this->price = null;
        $this->quantity = null;
    }

    public function getProductID() {
        return $this->productID;
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

    public function getQuantity() {
        return $this->quantity;
    }

    public function setProductID($productID): void {
        $this->productID = $productID;
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

    public function setQuantity($quantity): void {
        $this->quantity = $quantity;
    }

    //--------------------------------------------------------------------------
    public function getAllProduct() {
        $data = NULL;
        $myDB = new MySQLUtil();
        $query = "SELECT id, name, image, price, quantity FROM product";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }

    public function insertProduct() {
        $myDB = new MySQLUtil();

        $query = "INSERT INTO product (name, image, price, quantity) VALUES (:name, :image, :price, :quantity)";
        $para = array(":name" => $this->getName(), ":image" => $this->getImage(), ":price" => $this->getPrice(), ":quantity" => $this->getQuantity());
        $myDB->insertData($query, $para);
        $myDB->disconnectDB();
    }

    public function deleteProduct() {
        $myDB = new MySQLUtil();

        $query = "DELETE FROM product WHERE id=:id";
        $para = array(":id" => $this->getProductID());
        $myDB->updateData($query, $para);
        $myDB->disconnectDB();
    }

    public function getAllProductLimit($limit, $page) {
        $data = NULL;
        $myDB = new MySQLUtil();
        $query = "SELECT * FROM product ORDER BY id ASC LIMIT " . $limit . " OFFSET " . $page;
        // $para = array(":l" => $limit, ":p" => $page);
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }

}
