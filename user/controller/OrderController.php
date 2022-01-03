<?php
include_once '../model/ProductModel.php';
include_once '../controller/BaseController.php';



class OrderController extends BaseController{
    
    public function __construct($order_action) {
        switch ($order_action){
            case "add":
                $product_id = $_POST["product_id"];
                $product_name = $_POST["product_name"];
                $product_image = $_POST["product_image"];
                $product_price= $_POST["product_price"];
                $product = new ProductModel($product_id, $product_name, $product_image, $product_price, 1);
                
//            SESSION       
                if (!empty( $_SESSION["cart_item"])) {
                    if(array_key_exists($product_id, $_SESSION["cart_item"])){
                        $num =   $_SESSION["cart_item"][$product_id]->getNumber();
                        $_SESSION["cart_item"][$product_id]->setNumber($num + 1);
                    }else {
                        $_SESSION["cart_item"][$product_id] = $product ;
                    }
                }else {
                    $_SESSION["cart_item"][$product_id] = $product ;
                }
                header('Location: ../controller/OrderController.php');
                break;
            
            case "clear": //$_GET["action"] --> (action clear in menunavigationbar)
                unset($_SESSION);
                session_destroy();
                header('Location: ../controller/OrderController.php');
                break;
            case "checkout": //$_GET["action"] --> (action checkout in menunavigationbar)
                $data["current_cart"] = $_SESSION["cart_item"];
                $this->view("shoping-cart", $data); //basecontroller
                break;
            case "remove" :
                $productID = $_GET["id"];
//                var_dump($productID);
                unset($_SESSION["cart_item"][$productID]);
                if(!empty( $_SESSION["cart_item"])){
                    header('Location: ../controller/OrderController.php?action=checkout');
                }else {
                    header('Location: ../controller/OrderController.php');
                }
                break;
            case "update_cart":
                //xu ly sau
            case "page": 
                //xy ly sau
                $this->getAllProductByPage($product);    
                break;
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
    
//     public function getAllProductByPage($product) {
//        return $product->getAllProductByPage($product);
//    }
}


session_start();
$order_action = "";
//clear when create user (avoiding to create user twice when reload)
if (isset($_POST['order_action'])) {
     $order_action = $_POST['order_action'];
} else if(isset($_GET['action'])) {
     $order_action = $_GET['action'];
}else if(isset($_GET['page'])) {
     $order_action = $_GET['page'];
}
   
//rel to constructor
$orderController = new OrderController($order_action);