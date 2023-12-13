<?php

require_once __DIR__ . '/../../models/ProductModel.php';

use models\ProductModel;

$productModel = new ProductModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $variationID = $_POST['variationID'];
    $quantity = 1; // You can modify this based on the user input
    $price = $_POST['price'];
    $imgUrl = $_POST['imgUrl'];

    // Call the addToCart method to add the product to the shopping cart
    $productModel->addToCart($productID, $productName, $variationID, $quantity, $price, $imgUrl);
}

// Redirect the user back to the product page or any other desired location
header("Location: https://denisaneagu.com/CapWizards/ShoppingCart");
exit();