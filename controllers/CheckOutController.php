<?php

use models\CheckOutModel;
use models\ShoppingCart;

$action = $_GET["action"];

require_once __DIR__ . '/../models/CheckOutModel.php';
require_once __DIR__ . '/../models/ShoppingCart.php';

// Check if the form is submitted
if ($action == "Checkout") {
    $shoppingCart = new ShoppingCart();
    $cartItems = $shoppingCart->getCartContents();

    // Iterate through cart items to get product IDs
    foreach ($cartItems as $cartItem) {
        $productID = $cartItem['productID'];
        $variationID = $cartItem['variationID'];
        $quantity = $cartItem['quantity'];
        $price = $cartItem['price'];
    
        // Retrieve form data
        $customerID = $_POST['price'];
        $firstName = $_POST['firstName']; 
        $lastName = $_POST['lastName']; 
        $email = $_POST['userEmail'];
        $phoneNumber = $_POST['phoneNumber'];
        $country = $_POST['country']; 
        $city = $_POST['city']; 
        $zipcode = $_POST['zipcode']; 
        $street = $_POST['street']; 
        $houseNumber = $_POST['houseNumber']; 
        $apartmentNumber = $_POST['apartmentNumber'];

        // Create an instance of CheckOutModel
        $checkoutModel = new CheckOutModel();

        // Call the Checkout method from CheckOutModel
        $checkoutResult = $checkoutModel->Checkout($productID, $variationID, $quantity, $price, $customerID, $firstName, $lastName, $email, $phoneNumber, $country, $city, $zipcode, $street, $houseNumber, $apartmentNumber);

        // Handle the result, e.g., redirect or display a success message
        if ($checkoutResult) {
            // Display the data after a successful checkout
            echo "<h2>Checkout Successful</h2>";
            echo "<p>Name: $name</p>";
            echo "<p>Surname: $surname</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Phone Number: $phoneNumber</p>";
            echo "<p>Country: $country</p>";
            echo "<p>City: $city</p>";
            echo "<p>Zip-Code: $zipcode</p>";
            echo "<p>Street: $street</p>";
            echo "<p>House Number: $houseNumber</p>";
            echo "<p>Apartment Number: $apartmentNumber</p>";

        
            // Display cart items
            echo "<h3>Cart Items</h3>";
            foreach ($products as $product) {
                echo "<p>Product ID: {$product['productID']}</p>";
                echo "<p>Variation ID: {$product['variationID']}</p>";
                echo "<p>Quantity: {$product['quantity']}</p>";
                echo "<p>Price: {$product['price']}</p>";
          
            }
        } else {
            // Handle checkout failure
            echo 'Checkout failed. Please try again.';
        }
    } 
}