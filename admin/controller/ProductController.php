<?php

include_once '../model/ProductModel.php';
include_once '../utils/MySQLUtil.php';
include_once '../controller/BaseController.php';

class ProductController extends BaseController {

    public function __construct($product_action) {
        switch ($product_action) {
            case "create":
                $name = $_POST["txt_productname"];
                $image = "../view/img/product/" . time() . "_" . $_FILES['file_image']['name']; //------------
                $price = $_POST["txt_price"];
                $quantity = $_POST["txt_quantity"];
                move_uploaded_file($_FILES['file_image']['tmp_name'], "../../user" . substr($image, 2));
                $product = new ProductModel($image, $name, $price, $quantity, "");
                $this->insertProduct($product);
                header("Location: ../controller/ProductController.php");
                break;
            case "editproduct":
                $id = $_GET["id"];
                $product = new ProductModel("", "", "", "", $id);
                $data["product_info"] = $this->getProductByID($product);
                $this->view('producteditpage', $data);
                break;
            case "edit":
                $id = $_POST["txt_productid"];
                $name = $_POST["txt_productname"];
                $price = $_POST["txt_price"];
                $quantity = $_POST["txt_quantity"];
                if ($_FILES['file_image']['name'] != "") {
                    $image = "../view/assets/img/products/" . time() . "_" . $_FILES['file_image']['name'];
                    move_uploaded_file($_FILES['file_image']['tmp_name'], "../../user" . substr($image, 2));
                } else {
                    $image = $_POST["file_image"];
                }
                echo $image;
                $product = new ProductModel($name, $image, $price, $quantity, $id);
                $this->updateProduct($product);
                header("Location: ../controller/ProductController.php");
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

    function insertProduct($product) {
        return $product->insertProduct();
    }

    function updateProduct($product) {
        return $product->updateProduct();
    }

    public function getProductByID($product) {
        return $product->getProductByID();
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
