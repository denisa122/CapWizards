<?php

session_set_cookie_params([
    'samesite' => 'Lax', // Adjust the SameSite attribute as needed for your application
    'secure' => true,    // Enable this for HTTPS only
    'httponly' => true,  // Helps mitigate XSS attacks
    'lifetime' => 172800,  // Adjust the lifetime as needed
    'path' => '/',
    'domain' => '' // Adjust to your domain
]);

session_start();// Start the session if not already started
function create_unique_id() {
    return md5(uniqid(rand(), true));
}

if (!isset($_SESSION['customerID'])) {
    // Generate a unique customer ID and store it in the session
    $_SESSION['customerID'] = create_unique_id(); // Replace with your logic to generate an ID
}

if (!isset($_SESSION['orderID'])) {
    // Generate a unique order ID and store it in the session
    $_SESSION['orderID'] = create_unique_id(); // Replace with your logic to generate an ID
}

$customerID = $_SESSION['customerID'];
$orderID = $_SESSION['orderID'];

?>