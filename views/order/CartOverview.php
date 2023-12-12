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
</main>

<?php
require("./views/shared/footer.php");
?>