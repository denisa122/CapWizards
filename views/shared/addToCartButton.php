<?php

require_once __DIR__ . '/../../models/ProductModel.php';

use models\ProductModel;

$productModel = new ProductModel();

if (isset($_POST['add_to_cart'])) {
    $productID = $_POST['productID'];
    $variationID = $_POST['variationID'];
    $quantity = 1; // You can modify this based on the user input
    $price = $_POST['price'];

    // Call the addToCart method to add the product to the shopping cart
    $productModel->addToCart($productID, $variationID, $quantity, $price);
}

// Redirect the user back to the product page or any other desired location
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();