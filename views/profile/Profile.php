<?php

session_start();

require("./views/shared/header.php");
?>


<main>
    <?php
    // Check if the user is logged in
    if (isset($_SESSION['user'])) {
        // Access user information
        $user = $_SESSION['user'];
    ?>
        <h1>Welcome, <?php echo $user['firstName'] . ' ' . $user['lastName']; ?>!</h1>
        <p>This page is currently under construction.</p>
        <a href="http://denisaneagu.com/CapWizards">Go back to main page</a>
    <?php } else { ?>
        <h1>You are currently not logged in.</h1>
        <a href="http://denisaneagu.com/CapWizards/Login">Log in</a>

    <?php    } ?>

    <?php
    require("./views/shared/footer.php");
    ?>