<?php

session_start();

// if (!isset($_SESSION['customerID']))
// {
//     echo '<h1>You are not logged in.</h1>
//     <a href="http://localhost/CapWizards/Login">Log in</a>';
// } else
// {
//     echo '<h1>You are logged in.</h1>
//     <a href="http://localhost/CapWizards/Controllers/LoginController.php?action=logout">Logout</a>';
// }

// echo '<a href="http://localhost/CapWizards/Login">Log in</a>';


// Check if the user is logged in
if (isset($_SESSION['user'])) {
    // Access user information
    $userId = $_SESSION['user']['customerID'];
    $firstName = $_SESSION['user']['firstName'];
    $lastName = $_SESSION['user']['lastName'];
    $userName = $_SESSION['user']['userName'];

   echo "<h1>You are already logged in.</h1>
   <a href='http://localhost/CapWizards/controllers/LoginController.php?action=logout'>Log out</a>";

    // You can add more fields as needed
} else {
    // Redirect to the login page if the user is not logged in
    echo "<h1>You are not logged in.</h1>
    <a href='http://localhost/CapWizards/Login'>Log in</a>";
}
?>