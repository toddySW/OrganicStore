<?php
include_once '../utils/MySQLUtil.php';

class ProductModel {
    private $id;
    private $name;
    private $image;
    private $price;
    private $number;
  
    
    public function __construct($id, $name, $image, $price, $number){
    {
       $this->id = $id;
       $this->name = $name;
       $this->image = $image;
       $this->price = $price;
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
        $query = "SELECT id, name, image, price FROM product";
        $data = $myDB->getAllData($query);
        $myDB->disconnectDB();
        return $data;
    }
    
    
    
}
