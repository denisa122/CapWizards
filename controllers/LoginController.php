<?php

require_once __DIR__ . '/../models/LoginModel.php';

use models\LoginModel;

$loginModel = new LoginModel();

$action = $_GET["action"];

if ($action == "login")
{
    $userEmail = $_POST["userEmail"];
    $password = $_POST["password"];
    
    if(isset($userEmail) && isset($password))
    {
        $userEmail = $_POST["userEmail"];
        $password = $_POST["password"];

        $customer = $loginModel -> login($userEmail, $password);

        if ($customer)
        {
            //Authentication successful
            $_SESSION['customerID'] = $customer -> customerID;
            header("Location: http://localhost/CapWizards/");
        } else {
            //Authentication failed, redirect to login page with an error
            header("Location: http://localhost/CapWizards/Login"); //TODO change to an appropriate error
            exit();
        }
    } else
    {
        //Handle missing POST data
        header("Location: http://localhost/CapWizards/Login"); //TODO change to an appropriate error
        exit();
    }
} else if ($action == "register") //add first name, last name here since we have it on the form
{
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $password = $_POST["password"];

    if(isset($userName) && isset($userEmail) && isset($password))
    {
        $registerSuccess = $loginModel -> register($userName, $userEmail, $password);

        if($registerSuccess)
        {
            header("Location: http://localhost/CapWizards/Login");
            exit();
        } else {
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