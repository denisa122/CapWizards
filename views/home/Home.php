<?php
require("./views/shared/header.php");

require_once "./models/HomeModel.php";
require_once "./models/ProductModel.php";

use models\HomeModel;
use models\ProductModel;

$homeModel = new HomeModel();
$productModel = new ProductModel();


// $customerID = $_SESSION['customerID'];
// $orderID = $_SESSION['orderID'];

// if (isset($_POST['add_to_cart'])) {
//     $productID = $_POST['productID'];
//     $productID = filter_var($productID, FILTER_SANITIZE_STRING);

//     $order_exists = $conn->prepare("SELECT * FROM `Order` WHERE FK_customerID = ?");
//     $order_exists->bind_param("s", $customerID);
//     $order_exists->execute();
//     $resultOrder = $order_exists->get_result();

//     if ($resultOrder->num_rows === 0) {
//         // If no order exists, create a new order for the customer
//         $insert_order = $conn->prepare("INSERT INTO `Order` (orderID, FK_customerID) VALUES (?, ?)");
//         $insert_order->bind_param("ss", $orderID, $customerID);
//         $insert_order->execute();
//     }
    
//     $verify_cart = $conn->prepare("SELECT * FROM ProductOrder WHERE productID = ? AND orderID = ?");
//     $verify_cart->bind_param("ss", $productID, $orderID);
//     $verify_cart->execute();
//     $result = $verify_cart->get_result();

//     if ($result->num_rows > 0) {
//         $warning_msg[] = 'Already added to cart!';
//     } else {
//         $max_cart_items = $conn->prepare("SELECT * FROM `Order` WHERE orderID = ?");
//         $max_cart_items->bind_param("s", $orderID);
//         $max_cart_items->execute();
//         $result_max = $max_cart_items->get_result();


//         if ($result_max->num_rows >= 100) {
//             $warning_msg[] = 'Cart is full';
//         } else {
//             $select_p = $conn->prepare("SELECT * FROM Product WHERE productID = ? LIMIT 1");
//             $select_p->bind_param("s", $productID);
//             $select_p->execute();
//             $fetch_p = $select_p->get_result()->fetch_assoc();

//             $insert_customer = $conn->prepare("INSERT INTO Customer (customerID) VALUES (?) ON DUPLICATE KEY UPDATE customerID=customerID");
//             $insert_customer->bind_param("s", $customerID);
//             $insert_customer->execute();

//             // Get the last inserted customer ID
//             // $insert = $conn->lastInsertId();

//             $insert_order =  $conn->prepare("INSERT INTO `Order` (orderID, FK_customerID) VALUES (?, ?)");
//             $insert_order->bind_param("ss", $orderID, $FK_customerID);
//             $insert_order->execute();

//             // Get the last inserted order ID
//             // $orderID = $conn->lastInsertId();

//             $insert_product_order = $conn->prepare("INSERT INTO ProductOrder (productID, orderID) VALUES (?, ?)");
//             $insert_product_order->bind_param("ss", $productID, $orderID);
//             $insert_product_order->execute();

//             $success_msg[] = 'Product Added';
    
//         }
//     }
// }
?>

    <main class="pt-0">
    <!--banner-->
    <section class="banner text-center">
        <img src="/CapWizards/assets/svg/Intro section.svg" alt="">
    </section>

    <!--About us-->
    <section class="text-center about-section">
        <h2 class="h1-green margin-50">About Us</h2>
        <?php $homeModel -> getDescription(1); ?>
    </section>

    <!--Categories-->
    <section class="d-flex justify-content-between categories-section text-center">
        <a href="http://localhost/CapWizards/Products/Alcoholic" class="text-decoration-none">
            <img src="/CapWizards/assets/svg/beer.svg" alt="#">
            <h2>Alcoholic</h2>
        </a>

        <a href="http://localhost/CapWizards/Products/Non-alcoholic" class="text-decoration-none">
            <img src="/CapWizards/assets/svg/nonAlcoholic.svg" alt="#">
            <h2>Non alcoholic</h2>
        </a>
    </section>

    <!--Daily offers-->
    <section class="dailyOffers-section text-center">
        <h1 class="h1-black margin-50">Special offers</h1>
        <div class="d-flex justify-content-center justify-content-between">
                <?php 
                    $homeModel -> getSpecialOffers();
                ?>
        </div>
    </section>
    
    <!--News feed-->
    <article class="text-center">
        <h1 class="h1-black margin-50">News</h1>
        <div class="d-flex justify-content-center">
            <?php $homeModel -> getNews() ?>
        </div>
    </article>
</main>

<?php
require("./views/shared/footer.php");
?>