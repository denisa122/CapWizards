<?php

use models\ShoppingCart;

require_once __DIR__ . '/../models/ShoppingCart.php';

$shoppingCart = new ShoppingCart();

$action = $_GET['action'];

if ($action == "addToCart") {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $variationId = $_POST['variationId'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $imgUrl = $_POST['imgUrl'];

    $shoppingCart->addToCart($productId, $productName, $variationId, $quantity, $price, $imgUrl);

    header("Location: https://denisaneagu.com/CapWizards/ShoppingCart");
    exit();
} else if ($action == "updateQuantity") {
    $productId = $_POST['productId'];
    $variationId = $_POST['variationId'];
    $quantity = $_POST['quantity'];

    $shoppingCart->updateQuantity($productId, $variationId, $quantity);

    header("Location: https://denisaneagu.com/CapWizards/ShoppingCart");
    exit();
} else if ($action == "removeItem") {
    $productId = $_POST['productId'];
    $variationId = $_POST['variationId'];

    $shoppingCart->removeItem($productId, $variationId);

    header("Location: https://denisaneagu.com/CapWizards/ShoppingCart");
    exit();
} else if ($action == "clearCart") {
    $_SESSION['cart'] = [];
    header("Location: https://denisaneagu.com/CapWizards/ShoppingCart");
    exit();
}
