<?php

require_once ("./views/shared/session.php");
require_once("././dataaccess/db/DBConnector.php");

$FK_customerID = $_SESSION['customerID'];
$count_cart_items = $conn->prepare("SELECT * FROM `Order` WHERE FK_customerID =?");
$count_cart_items->execute();
$count_cart_items->store_result();

$total_cart_items = $count_cart_items->num_rows;

$customerID = $_SESSION['customerID'];
$orderID = $_SESSION['orderID'];

if (isset($_POST['add_to_cart'])) {
    $productID = $_POST['productID'];
    $productID = filter_var($productID, FILTER_SANITIZE_STRING);

    $order_exists = $conn->prepare("SELECT * FROM `Order` WHERE FK_customerID = ?");
    $order_exists->bind_param("s", $customerID);
    $order_exists->execute();
    $resultOrder = $order_exists->get_result();

    if ($resultOrder->num_rows === 0) {
        // If no order exists, create a new order for the customer
        $insert_order = $conn->prepare("INSERT INTO `Order` (orderID, FK_customerID) VALUES (?, ?)");
        $insert_order->bind_param("ss", $orderID, $customerID);
        $insert_order->execute();
    }
    
    $verify_cart = $conn->prepare("SELECT * FROM ProductOrder WHERE productID = ? AND orderID = ?");
    $verify_cart->bind_param("ss", $productID, $orderID);
    $verify_cart->execute();
    $result = $verify_cart->get_result();

    if ($result->num_rows > 0) {
        $warning_msg[] = 'Already added to cart!';
    } else {
        $max_cart_items = $conn->prepare("SELECT * FROM `Order` WHERE orderID = ?");
        $max_cart_items->bind_param("s", $orderID);
        $max_cart_items->execute();
        $result_max = $max_cart_items->get_result();


        if ($result_max->num_rows >= 100) {
            $warning_msg[] = 'Cart is full';
        } else {
            $select_p = $conn->prepare("SELECT * FROM Product WHERE productID = ? LIMIT 1");
            $select_p->bind_param("s", $productID);
            $select_p->execute();
            $fetch_p = $select_p->get_result()->fetch_assoc();

            $insert_customer = $conn->prepare("INSERT INTO Customer (customerID) VALUES (?) ON DUPLICATE KEY UPDATE customerID=customerID");
            $insert_customer->bind_param("s", $customerID);
            $insert_customer->execute();

            // Get the last inserted customer ID
            // $insert = $conn->lastInsertId();

            $insert_order =  $conn->prepare("INSERT INTO `Order` (orderID, FK_customerID) VALUES (?, ?)");
            $insert_order->bind_param("ss", $orderID, $FK_customerID);
            $insert_order->execute();

            // Get the last inserted order ID
            // $orderID = $conn->lastInsertId();

            $insert_product_order = $conn->prepare("INSERT INTO ProductOrder (productID, orderID) VALUES (?, ?)");
            $insert_product_order->bind_param("ss", $productID, $orderID);
            $insert_product_order->execute();

            $success_msg[] = 'Product Added';
    
        }
    }
}
?>