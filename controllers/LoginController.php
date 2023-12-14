<?php

require_once __DIR__ . '/../models/LoginModel.php';

use models\LoginModel;

$loginModel = new LoginModel();

// Set session lifetime to 30 minutes
ini_set('session.gc_maxlifetime', 1800);

// Start the session
session_start();

$action = $_GET["action"];

if ($action == "login") {
    $userName = $_POST["userName"];
    $password = $_POST["password"];

    if (isset($userName) && isset($password)) {
        $userName = $_POST["userName"];
        $password = $_POST["password"];

        $customer = $loginModel->login($userName, $password);

        if ($customer) {
            //Authentication successful
            $_SESSION['customerID'] = $customer['customerID'];
            $_SESSION['user'] = [
                'customerID' => $customer['customerID'],
                'firstName' => $customer['firstName'],
                'lastName' => $customer['lastName'],
                'userName' => $customer['userName'],
                'role' => $customer['role'],
            ];

            header("Location: http://denisaneagu.com/CapWizards/");
        } else {
            //Authentication failed
            $_SESSION['loginError'] = "Invalid email or password";
            header("Location: http://denisaneagu.com/CapWizards/Login");
            exit();
        }
    } else {
        //Handle missing POST data
        header("Location: http://denisaneagu.com/CapWizards/Login");
        exit();
    }
} else if ($action == "logout") {
    unset($_SESSION['customerID']);
    unset($_SESSION['user']);

    // Destroy the session
    session_destroy();

    header("Location:http://denisaneagu.com/CapWizards");
    exit();
} else if ($action == "register") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $password = $_POST["password"];

    if (isset($firstName) && isset($lastName) && isset($userName) && isset($userEmail) && isset($password)) {
        $registerSuccess = $loginModel->register($firstName, $lastName, $userName, $userEmail, $password);

        if ($registerSuccess) {
            header("Location: http://denisaneagu.com/CapWizards/Login");
            exit();
        } else {
            $_SESSION['registerError'] = "Failed to register user";
            header("Location: http://denisaneagu.com/CapWizards/Register");
            exit();
        }
    } else {
        //Handle missing POST data
        header("Location: http://denisaneagu.com/CapWizards/Register");
        exit();
    }
}

header("Location: " . "../");
