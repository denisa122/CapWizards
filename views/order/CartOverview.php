<?php

require_once "./models/ProductModel.php";
require_once "./models/ShoppingCart.php";

use models\ProductModel;
use models\ShoppingCart;

$productModel = new ProductModel();
$cart = new ShoppingCart();

$cartItems = $cart -> getCartItemsForDisplay();

require("./views/shared/header.php");
?>

<main>
    <section class="text-center margin-100">
        <h1 class="h1-black">Shopping Cart</h1>
    </section>

    <section class="cart-items">
        <?php foreach ($cartItems as $cartItem) : ?>
            <?= $cartItem ?>
        <?php endforeach; ?>
    </section>
    <div class="row text-center form-button-wrapper"><a href="http://denisaneagu.com/CapWizards/views/order/CheckOut" class="big-button form-button">Go to checkout</a></div>
</main>

<?php
require("./views/shared/footer.php");
?>