<?php

include_once '../model/ProductModel.php';
include_once '../utils/MySQLUtil.php';
include_once '../controller/BaseController.php';

class ProductController extends BaseController {

    public function __construct($product_action) {
        switch ($product_action) {
            case 'create':
                $txt_productname = $_POST["txt_productname"]; //attribute name in usercreatepage.php
                $txt_image = $_POST["file_image"];
                $txt_price = ($_POST["txt_price"]);
                $txt_quantity = $_POST["txt_quantity"];
                $product = new ProductModel($txt_productname, "", $txt_price, $txt_quantity);
                header('Location: ../controller/ProductController.php');
                break;
            case 'delete':
                $id = $_GET["id"]; //lay ID 
                $product = new ProductModel("", "", "", "", $id);
                $data['product_info'] = $this->deleteProduct($product, "id");
                header('Location: ../controller/ProductController.php');

                break;
            default:
                if (isset($_GET['page'])) {
                    $offset = ($_GET['page'] - 1) * 6;
                } else {
                    $offset = 0;
                }
                $product = new productModel("", "", "", "", 0);
                $data["product"] = $this->getAllProduct($product);
                $data['product_list'] = $this->getAllProductLimit($product, 6, $offset);
                $this->view("productlistpage", $data); //basecontroller
                break;
        }
    }

    function getAllProductLimit($product, $limit, $page = 0) {
        return $product->getAllProductLimit($limit, $page);
    }

    function getAllProduct($product) {
        return $product->getAllProduct();
    }

    public function insertProduct($product) {
        $product->insertProduct();
    }

    public function deleteProduct($product) {
        $product->deleteProduct();
    }

}

//------------------------------------------------------------------------------
$product_action = "";

if (isset($_POST['product_action'])) {
    $product_action = $_POST['product_action'];
} else if (isset($_GET['action'])) {
    $product_action = $_GET['action'];
}

$productController = new ProductController($product_action);
