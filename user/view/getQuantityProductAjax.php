<?php
include_once '../model/ProductModel.php';
    $product = new ProductModel("", "", "", "", "", 0);
$id = $_GET["id"];
$data = $product->getProductByID($id);
echo $data["quantity"];
?>
     
