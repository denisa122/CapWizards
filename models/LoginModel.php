<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class LoginModel extends BaseModel
{
    function __construct()
    {
    }

    function login($userName, $password)
    {
        try {
            $cxn = parent::connectToDB();

            // Check if the user exists
            $query = "SELECT * FROM Account a 
            JOIN Customer c ON a.accountID = c.FK_accountID
            WHERE a.userName = :userName";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(':userName', $userName);

            $sanitized_username = htmlspecialchars($userName); //Sanitize input using built-in PHP method
            $stmt->bindParam(":userName", $sanitized_username);

            $stmt->execute();

            $customer = $stmt->fetch(\PDO::FETCH_ASSOC);

            // Verify the password if the user exists
            if (isset($customer) && password_verify($password, $customer['password'])) {
                // Authentication successful
                $_SESSION['customerID'] = $customer['customerID'];
                $_SESSION['user'] = [
                    'customerID' => $customer['customerID'],
                    'firstName' => $customer['firstName'],
                    'lastName' => $customer['firstName'],
                    'userName' => $customer['userName'],
                    'role' => $customer['role'],
                ];

                return $customer;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function register($firstName, $lastName, $userName, $userEmail, $password)
    {
        try {
            $cxn = parent::connectToDB();

            // Check the email is not used already
            $query = "SELECT * 
            FROM Customer 
            WHERE email = :email";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(':email', $userEmail);

            $sanitized_email = htmlspecialchars($userEmail); //Sanitize input using built-in PHP method
            $stmt->bindParam(":email", $sanitized_email);

            $stmt->execute();

            $totalCustomers = $stmt->rowCount();
            if ($totalCustomers > 0) {
                echo "Email is already taken!";
            } else {
                // Generate a password hash
                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

                // Start transaction
                $cxn->beginTransaction();

                try {
                    // Insert data into the account table
                    $query = "INSERT INTO Account (userName, password, role) 
                    VALUES (:userName, :password, 'customer')";
                    $stmt = $cxn->prepare($query);

                    $stmt->bindParam(':userName', $userName);
                    $stmt->bindParam(':password', $passwordHashed);

                    $stmt->execute();

                    // Get the last inserted accountID
                    $accountID = $cxn->lastInsertId();

                    // Insert data into the customer table
                    $query = "INSERT INTO Customer (firstName, lastName, email, FK_accountID) 
                    VALUES (:first, :last, :email, :accountID)";
                    $stmt = $cxn->prepare($query);

                    $stmt->bindParam(':first', $firstName);
                    $stmt->bindParam(':last', $lastName);
                    $stmt->bindParam(':email', $userEmail);
                    $stmt->bindParam(':accountID', $accountID);

                    $stmt->execute();

                    // Commit the transaction
                    $cxn->commit();

                    return true;
                } catch (\PDOException $e) {
                    // Rollback the transaction on error
                    $cxn->rollBack();
                    
                    echo $e->getMessage();
                    return false;
                }
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
