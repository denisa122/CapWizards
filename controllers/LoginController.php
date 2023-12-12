<?php

require_once __DIR__ . '/../models/LoginModel.php';

use models\LoginModel;

$loginModel = new LoginModel();

session_start();

$action = $_GET["action"];

if ($action == "login")
{
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    
    if(isset($userName) && isset($password))
    {
        $userName = $_POST["userName"];
        $password = $_POST["password"];

        $customer = $loginModel -> login($userName, $password);

        if ($customer)
        {
            //Authentication successful

            $_SESSION['customerID'] = $customer['customerID'];
            $_SESSION['user'] = [
                'customerID' => $customer['customerID'],
                'firstName' => $customer['firstName'],
                'lastName' => $customer['lastName'],
                'userName' => $customer['userName'],
            ];

            header("Location: http://localhost/CapWizards/");
        } else {
            //Authentication failed, redirect to login page with an error
            $_SESSION['loginError'] = "Invalid email or password";
            header("Location: http://localhost/CapWizards/Login"); //TODO change to an appropriate error
            exit();
        }
    } else
    {
        //Handle missing POST data
        header("Location: http://localhost/CapWizards/Login"); //TODO change to an appropriate error
        exit();
    }
} 
else if ($action == "logout")
{
    unset($_SESSION['customerID']);
    unset($_SESSION['user']);

    // Destroy the session
    session_destroy();

    header("Location:http://localhost/CapWizards");
    exit();
}
else if ($action == "register") //add first name, last name here since we have it on the form
{
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $password = $_POST["password"];

    if(isset($firstName) && isset($lastName) && isset($userName) && isset($userEmail) && isset($password))
    {
        $registerSuccess = $loginModel -> register($firstName, $lastName, $userName, $userEmail, $password);

        if($registerSuccess)
        {
            header("Location: http://localhost/CapWizards/Login");
            exit();
        } else {
            $_SESSION['registerError'] = "Failed to register user";
            header("Location: http://localhost/CapWizards/Register"); //TODO change to an appropriate error
            exit();
        }
    } else {
        //Handle missing POST data
        header("Location: http://localhost/CapWizards/Register"); //TODO change to an appropriate error
        exit();
    }
}

header("Location: " . "../");