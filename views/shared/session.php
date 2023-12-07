<?php

session_start(); // Start the session if not already started

function create_unique_id() {
    return md5(uniqid(rand(), true));
}

if (!isset($_SESSION['customerID'])) {
    // Generate a unique customer ID and store it in the session
    $_SESSION['customerID'] = create_unique_id(); // Replace with your logic to generate an ID
}


$FK_customerID = $_SESSION['customerID'];