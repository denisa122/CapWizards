<?php

use models\CheckOutModel;
use models\ShoppingCart;

require_once __DIR__ . '/../models/CheckOutModel.php';
require_once __DIR__ . '/../models/ShoppingCart.php';

$action = $_GET["action"];

$checkoutModel = new CheckOutModel();
$shoppingCart = new ShoppingCart();

// Check if the form is submitted
if ($action == "Checkout") {
    // Get user input for customer and address information
    $customerData = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'phoneNumber' => $_POST['phoneNumber']
    ];

    $addressData = [
        'country' => $_POST['country'],
        'city' => $_POST['city'],
        'zipcode' => $_POST['zipcode'],
        'street' => $_POST['street'],
        'houseNumber' => $_POST['houseNumber'],
        'apartmentNumber' => $_POST['apartmentNumber']
    ];

    // Get cart items
    $cartItems = $shoppingCart->getCartContents();

    // Place the order
    if ($checkoutModel->placeOrder($customerData, $addressData, $cartItems)) {
        // Order placed successfully
        // Generate the invoice HTML
        $invoiceHTML = "
        <html>
        <body>
        <div style='display:flex; flex-orientation:row;'>
        <div>
        <a href='https://denisaneagu.com/CapWizards/'>Go back to the main page</a>
        </div>
        <div>

            <h1>Invoice</h1>
            <h3>Customer information</h3><br>
            <p>First name: {$customerData['firstName']}</p><br>
            <p>Last name: {$customerData['lastName']}</p><br>
            <h3>Order summary</h3>
            <table style='border-style:solid; border-spacing:25px; text-align:center;'>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price per item</th>
                </tr>";

        // Add items to the invoice table
        foreach ($cartItems as $item) {
            $itemName = $item['productName'];
            $quantity = $item['quantity'];
            $price = $item['price'];

            $invoiceHTML .= " 
                <tr>
                    <td>$itemName</td>
                    <td>$quantity</td>
                    <td>$price</td>
                </tr";
        }
        $invoiceHTML .= "
            </table><br>
            <p>Final price: {$checkoutModel->calculateFinalPrice($cartItems)}</p><br>
            <h3>Delivery address</h3>
            <p>Country: {$addressData['country']}</p><br>
            <p>City: {$addressData['city']}</p><br>
            <p>Street: {$addressData['street']}</p><br>
            <p>Number: {$addressData['houseNumber']}, {$addressData['apartmentNumber']} </p><br>
            <p>Zip code: {$addressData['zipcode']}</p><br>
            </div>
            </div>
        </body>
        </html>
        ";

        // Display the invoice to the user
        $shoppingCart->clearCart();
        session_unset();
        echo $invoiceHTML;
    } else {
        // Failed to place the order
        echo "<script>
        alert('Order could not be placed :(');
    
        </script>";
        exit();
    }
}
