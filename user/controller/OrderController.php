<?php
include_once '../model/ProductModel.php';
include_once '../controller/BaseController.php';


class OrderController extends BaseController{
    
    public function __construct($order_action) {
        switch ($order_action){
            
            default :
                $product = new ProductModel("", "", "", "", 0);
                $data["product_list"] = $this->getAllProduct($product);
                $this->view("shop-grid", $data); //basecontroller
                break;
        }  
    }
    
    
    
    public function getAllProduct($product) {
        return $product->getAllProduct($product);
    }
}


$order_action = "";
//clear when create user (avoiding to create user twice when reload)
if (isset($_POST['order_action'])) {
    $user_action = $_POST['$order_action'];
} 


//rel to constructor
$orderController = new OrderController($order_action);
