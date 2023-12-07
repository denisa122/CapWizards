<?php
require("./views/shared/header.php");
require_once ("./views/shared/session.php");

?>

<!-- Main -->
    <main>
        <section class="cart-item-section">
            <h1 class="text-center margin-50 h1-black">Cart overview</h1>

            <?php 
                $finalPrice = 0;
                $select_order = null;
                if(isset($_SESSION['customerID'])) {
                $FK_customerID = $_SESSION['customerID'];

                $select_order = $conn->prepare("SELECT * FROM ProductOrder JOIN `Order` JOIN Product ON Order.orderID = ProductOrder.orderID AND ProductOrder.productID = Product.productID WHERE order.FK_customerID = ?");
                $select_order->execute([$FK_customerID]);
                }
                if($select_order && $select_order->rowCount() > 0) {
    
                    while($fetch_order = $select_order->fetch(PDO::FETCH_ASSOC)){
                        $select_products = $conn->prepare("SELECT * FROM Product WHERE productID = ?");
                        $select_products->execute([$fetch_order['productID']]);  
                    if($select_products->rowCount() > 0){
                    while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){  
            ?>

            <article class="cart-product d-flex justify-content-center justify-content-between">
                <div class="col1-p"><img class="img-150" src="<?= $fetch_product['Product.imgUrl']; ?>" alt="<?= $fetch_product['Product.altTxt']; ?>"></div>
                <div class="col2-p">
                    <h2 class="h2-black"><?= $fetch_product['Product.productName']; ?></h2>
                    <div>
                        <button class="c-variations"></button>
                        <button class="c-variations"></button>
                        <button class="c-variations"></button>
                    </div>
                </div>
                <div class="col3-p">
                    <div class="row">
                        <button class="minus">-</button>
                            <input class="amount text-center rounded-0" id="amount" type="text" value="<?= $fetch_product['ProductOrder.quantity']; ?>" type="number">
                        <button class="plus">+</button>
                    </div>
                </div>
                <div class="mb-0 col3-p">
                    <h2><?= $fetch_product['order.finalPrice']; ?>/h2>
                </div>
            </article>
            <div class="text-center"><a href="checkout.php?get_id=<?$fetch_product['id']; ?>" class="big-button btn-checkout">Go to checkout</a></div>
        </section>
    </main>

<?php
            }
        }else{
            echo "<p>No products found!</p>";
        }
    }
    }else {
        echo "<p>Shopping cart is empty</p>";
    }
    require("./views/shared/footer.php") 
?>
 