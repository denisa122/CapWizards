<?php

require_once __DIR__ . '/../../models/ProductModel.php';

use models\ProductModel;

$productModel = new ProductModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $variationID = $_POST['variationID'];
    $quantity = 1; // Add just 1 to the cart at a time
    $price = $_POST['price'];
    $imgUrl = $_POST['imgUrl'];

    $productModel->addToCart($productID, $productName, $variationID, $quantity, $price, $imgUrl);
}

header("Location: https://denisaneagu.com/CapWizards/ShoppingCart");
exit();
