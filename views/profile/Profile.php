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
    $user = $_SESSION['user'];
    ?>
    <body>
        <h1>Welcome, <?php echo $user['firstName'] . ' ' . $user['lastName']; ?>!</h1>
        <p>Username: <?php echo $user['userName']; ?></p>
        <p>Your role is: <?php echo $user['role']; ?></p>
    </body>
    <?php
} else {
    // Redirect the user to the login page if not logged in
    header("Location: http://denisaneagu.com/CapWizards/Login");
    exit();
}
?>