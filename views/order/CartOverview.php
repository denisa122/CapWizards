<?php
require("./views/shared/header.php");
require_once("././dataaccess/db/DBConnector.php");
$customerID = $_SESSION['customerID'];
$orderID = $_SESSION['orderID'];
?>

<!-- Main -->
    <main>
        <section class="cart-item-section">
            <h1 class="text-center margin-50 h1-black">Cart overview</h1>

            <?php 
                $select_order = null;
                $order_exists = $conn->prepare("SELECT * FROM `Order` WHERE FK_customerID = ?");
                $order_exists->bind_param("s", $customerID);
                $order_exists->execute();
                $resultOrder = $order_exists->get_result();

                if($resultOrder->num_rows === 0) {
                    echo "<p>Shopping cart is empty</p>";
                }else{
                    $existing_order = $resultOrder->fetch_assoc();
                    $orderID = $existing_order['orderID'];
                    $select_order = $conn->prepare("SELECT Product.imgUrl, Product.altTxt, Product.productName, Product.price, ProductOrder.quantity, ProductOrder.orderID FROM ProductOrder JOIN Product ON ProductOrder.productID = Product.productID WHERE ProductOrder.orderID = ?");
                    $select_order->bind_param("s", $orderID);
                    $select_order->execute();
                    $order_result = $select_order->get_result();
            
    
                  while ($fetch_order = $order_result->fetch_assoc()) { 
            ?>

            <article class="cart-product d-flex justify-content-center justify-content-between">
                <div class="col1-p"><img class="img-150" src="<?= $fetch_order['imgUrl']; ?>" alt="<?= $fetch_order['altTxt']; ?>"></div>
                <div class="col2-p">
                    <h2 class="h2-black"><?= $fetch_order['productName']; ?></h2>
                    <div>
                        <button class="c-variations"></button>
                        <button class="c-variations"></button>
                        <button class="c-variations"></button>
                    </div>
                </div>
                <div class="col3-p">
                    <div class="row">
                        <button class="minus">-</button>
                            <input class="amount text-center rounded-0" id="amount" value="<?= $fetch_order['quantity']; ?>" type="number">
                        <button class="plus">+</button>
                    </div>
                </div>
                <div class="mb-0 col3-p">
                    <h2><?= $fetch_order['price'] * $fetch_order['quantity']; ?></h2>
                </div>
            </article>
            <?php } ?>
            <div class="text-center"><a href="" class="big-button btn-checkout">Go to checkout</a></div>
        </section>
    </main>

    <?php 
    };
    require("./views/shared/footer.php");
?>
 