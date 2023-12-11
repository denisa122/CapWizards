<?php

session_start();

if (!isset($_SESSION['customerID']))
{
    echo '<h1>You are not logged in.</h1>
    <a href="http://localhost/CapWizards/Login">Log in</a>';
} else
{
    echo '<h1>You are logged in.</h1>
    <a href="http://localhost/CapWizards/Controllers/LoginController.php?action=logout">Logout</a>';
}