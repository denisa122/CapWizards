<?php

require_once "./models/ProductModel.php";
require_once "./models/ShoppingCart.php";

use models\ProductModel;
use models\ShoppingCart;

$productModel = new ProductModel();
$cart = new ShoppingCart();

$cartItems = $cart->getCartItemsForDisplay();

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
    <div style="display:flex; flex-direction:row; justify-content:center;">
        <div class="row text-center form-button-wrapper"><a href="http://denisaneagu.com/CapWizards/views/order/CheckOut" class="big-button form-button">Go to checkout</a></div>
        <form method="POST" action="<?php echo BASE_URL ?>/controllers/ShoppingCartController.php?action=clearCart" style="margin-left:20px;">
            <button type="submit" class="big-button form-button" style=" background-color:red; color:white;">Empty shopping cart</button>
        </form>
    </div>
</main>

<?php
require("./views/shared/footer.php");
?>