<?php
require_once ("session.php");
require_once("../../dataaccess/db/DBConnector.php");


$customerID = $_SESSION['customerID'];
$orderID = $_SESSION['orderID'];
// $orderID = isset($_SESSION['orderID']) ? $_SESSION['orderID'] : null;

// echo $customerID;

if (isset($_POST['add_to_cart'])) {
    $productID = $_POST['productID'];
    $productID = filter_var($productID, FILTER_SANITIZE_STRING);

    $order_exists = $conn->prepare("SELECT * FROM `Order` WHERE FK_customerID = ?");
    $order_exists->bind_param("s", $customerID);
    $order_exists->execute();
    $resultOrder = $order_exists->get_result();
   
    
    if ($resultOrder->num_rows === 0) {
        // If no order exists, create a new order for the customer
        $orderID = $_SESSION['orderID']; // Generate a unique order ID
        $insert_order = $conn->prepare("INSERT INTO `Order` (orderID, FK_customerID) VALUES (?, ?)");
        $insert_order->bind_param("ss", $orderID, $customerID);
        $insert_order->execute();
    } else {
        // If an order exists, fetch the orderID
        $existing_order = $resultOrder->fetch_assoc();
        $orderID = $existing_order['orderID'];
    }

    // if ($orderID === null) {
    //     $order_exists = $conn->prepare("SELECT * FROM `Order` WHERE FK_customerID = ?");
    //     $order_exists->bind_param("s", $customerID);
    //     $order_exists->execute();
    //     $resultOrder = $order_exists->get_result();

    //     if ($resultOrder->num_rows === 0) {
    //         // If no order exists, create a new order for the customer
    //         $orderID = create_unique_id(); // Create a unique order ID
    //         $_SESSION['orderID'] = $orderID; // Store the orderID in the session
    //         $insert_order = $conn->prepare("INSERT INTO `Order` (orderID, FK_customerID) VALUES (?, ?)");
    //         $insert_order->bind_param("ss", $orderID, $customerID);
    //         $insert_order->execute();
    //     } else {
    //         // If an order exists, fetch the orderID
    //         $existing_order = $resultOrder->fetch_assoc();
    //         $orderID = $existing_order['orderID'];
    //     }

    // }


    // if ($resultOrder->num_rows === 0) {
    //     // If no order exists, create a new order for the customer
    //     echo "Customer doesn't exist!";
    //     if ($orderID === null) {
    //         $orderID = create_unique_id(); // Create a unique order ID
    //         $_SESSION['orderID'] = $orderID; // Store the orderID in the session
    //     }
        
    //     $insert_order = $conn->prepare("INSERT INTO `Order` (orderID, FK_customerID) VALUES (?, ?)");
    //     $insert_order->bind_param("ss", $orderID, $customerID);
    //     $insert_order->execute();
    // } else {
    //     // If an order exists, fetch the orderID
    //     $existing_order = $resultOrder->fetch_assoc();
    //     $orderID = $existing_order['orderID'];
    // }

    
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

            $quantity = 1;
            $insert_product_order = $conn->prepare("INSERT INTO ProductOrder (productID, orderID, quantity) VALUES (?, ?, ?)");
            $insert_product_order->bind_param("sss", $productID, $orderID, $quantity);
            $insert_product_order->execute();
            
            echo ('Product Added');
            }
    
        }
    }
?>