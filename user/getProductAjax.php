<?php

include_once '../model/Product.php';
$product = new Product("1", "", "", "", "");
$id = $_GET["id"];
$data = $product->getProductByID($id);
echo $data["quantity"];
// put your code here
?>