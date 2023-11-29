<?php
require("./views/shared/header.php") 
?>

<!-- Main -->
<main>
    <!-- Cart item -->
        <section class="cart-item-section">
            <h1 class="text-center margin-50 h1-black">Cart overview</h1>
            <article class="cart-product d-flex justify-content-center justify-content-between">
                <div class="col1-p"><img class="img-150" src="/Assets/img/breezer/Breezer_oryginal.png" alt=""></div>
                <div class="col2-p">
                    <h2 class="h2-black">Product name</h2>
                    <div>
                        <button class="c-variations"></button>
                        <button class="c-variations"></button>
                        <button class="c-variations"></button>
                    </div>
                </div>
                <div class="col3-p">
                    <div class="row">
                        <button class="minus">-</button>
                            <input class="amount text-center rounded-0" id="amount" type="text" value="1" input[type=number]>
                        <button class="plus">+</button>
                    </div>
                </div>
                <div class="mb-0 col3-p">
                    <h2>Price</h2>
                </div>
            </article>
            <div class="text-center"><a class="big-button btn-checkout">Go to checkout</a></div>
        </section>
    </main>

<?php
require("./views/shared/footer.php") 
?>
 