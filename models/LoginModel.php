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
        try 
        {
            $cxn = parent::connectToDB();

            //Prepare and execute a query to check if the user exists
            $query = "SELECT * FROM account a 
                    JOIN customer c ON a.accountID = c.FK_accountID
                    WHERE a.userName = :userName";


            // $query = "SELECT * FROM account WHERE userName = :userName";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(':userName', $userName);

            $sanitized_username = htmlspecialchars($userName); //Sanitize input using built-in PHP method
            $stmt -> bindParam(":userName", $sanitized_username);

            $stmt -> execute();

            //Fetch the customer data
            $customer = $stmt -> fetch(\PDO::FETCH_ASSOC);

            //Verify the password if the user exists
            if (isset($customer) && password_verify($password, $customer['password']))
            {
                // Authentication successful
                $_SESSION['customerID'] = $customer['customerID'];
                return $customer;
            } else {
                // Invalid email or username
                return false;
            }
        } catch (\PDOException $e){
            echo $e -> getMessage();
        }

    }

    function register($firstName, $lastName, $userName, $userEmail, $password)
    {
        try 
        {
            $cxn = parent::connectToDB();

            //Prepare and execute a statement to check that the email is not used already
            $query = "SELECT * FROM customer WHERE email = :email";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(':email', $userEmail);

            $sanitized_email = htmlspecialchars($userEmail); //Sanitize input using built-in PHP method
            $stmt -> bindParam(":email", $sanitized_email);
            
            $stmt -> execute();

            $totalCustomers = $stmt -> rowCount();
            if ($totalCustomers > 0)
            {
                echo "Email is already taken!";
            } else {
                // Generate a password hash
                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
                
                // Start a transaction
                $cxn -> beginTransaction();

                try {
                    // Insert data into the account table
                    $query = "INSERT INTO account (userName, password, role) VALUES (:userName, :password, 'customer')";
                    $stmt = $cxn -> prepare($query);
                    $stmt -> bindParam(':userName', $userName);
                    $stmt -> bindParam(':password', $passwordHashed);
                    $stmt -> execute();

                    // Get the last inserted accountID
                    $accountID = $cxn -> lastInsertId();

                    // Insert data into the customer table
                    $query = "INSERT INTO customer (firstName, lastName, email, userName, FK_accountID) VALUES (:first, :last, :email, :userName, :accountID)";
                    $stmt = $cxn -> prepare($query);
                    $stmt -> bindParam(':first', $firstName);
                    $stmt -> bindParam(':last', $lastName);
                    $stmt -> bindParam(':email', $userEmail);
                    $stmt -> bindParam(':userName', $userName);
                    $stmt -> bindParam(':accountID', $accountID);
                    $stmt -> execute();

                    // Commit the transaction
                    $cxn -> commit();

                    return true;
                } catch (\PDOException $e) {
                    // Rollback the transaction on error
                    $cxn -> rollBack();
                    echo $e -> getMessage();
                    return false;
                }

                // $query = "INSERT INTO customer (firstName, lastName, email, userName, password) VALUES (:first, :last, :email, :userName, :password)";
                // $stmt = $cxn -> prepare($query);
                // $stmt -> bindParam(':first', $firstName);
                // $stmt -> bindParam(':last', $lastName);
                // $stmt -> bindParam(':email', $userEmail);
                // $stmt -> bindParam(':userName', $userName);
                // $stmt -> bindParam(':password', $passwordHashed);

                // return $stmt -> execute();
            }
        }  catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }
}