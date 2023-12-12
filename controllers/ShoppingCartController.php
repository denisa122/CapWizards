<?php

use models\ShoppingCart;

require_once __DIR__ . '/../models/ShoppingCart.php';

// Create an instance of the ShoppingCart class
$shoppingCart = new ShoppingCart();

// Handle actions like adding to cart, updating quantity, etc.
$action = $_GET['action'];

if ($action == "addToCart")
{
    $productId = $_POST['productId'];
    $variationId = $_POST['variationId'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $shoppingCart->addToCart($productId, $variationId, $quantity, $price);

    header("Location: http://localhost/CapWizards/Products/?productID=$productId&variationID=$variationId");
    exit();
} else if ($action == "updateQuantity")
{
    $productId = $_POST['productId'];
    $variationId = $_POST['variationId'];
    $quantity = $_POST['quantity'];

    $shoppingCart -> updateQuantity($productId, $variationId, $quantity);

    header("Location: http://localhost/CapWizards/Products/?productID=$productId&variationID=$variationId");
    exit();
} else if ($action == "removeItem")
{
    $productId = $_POST['productId'];
    $variationId = $_POST['variationId'];

    $shoppingCart -> removeItem($productId, $variationId);

    header("Location: http://localhost/CapWizards/Products/?productID=$productId&variationID=$variationId");
    exit();
}