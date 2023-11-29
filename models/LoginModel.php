<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class LoginModel extends BaseModel
{
    function __construct()
    {
        
    }

    function login($userEmail, $password)
    {
        try 
        {
            $cxn = parent::connectToDB();

            //Prepare and execute a query to check if the user exists
            $query = "SELECT * FROM customer WHERE email = :email";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(':email', $userEmail);

            $sanitized_email = htmlspecialchars($userEmail); //Sanitize input using built-in PHP method
            $stmt -> bindParam(":email", $sanitized_email);

            $stmt -> execute();

            //Fetch the customer data
            $customer = $stmt -> fetch(\PDO::FETCH_ASSOC);

            //Verify the password if the user exists
            if (isset($customer))
            {
                if(password_verify($password, $customer -> password))
                {
                    return $customer;
                } else {
                    //Invalid email or password
                    return false;
                }
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
                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO customer (firstName, lastName, email, userName, password) VALUES (:first, :last, :email, :userName, :password)";
                $stmt = $cxn -> prepare($query);
                $stmt -> bindParam(':first', $firstName);
                $stmt -> bindParam(':last', $lastName);
                $stmt -> bindParam(':email', $userEmail);
                $stmt -> bindParam(':userName', $userName);
                $stmt -> bindParam(':password', $passwordHashed);

                return $stmt -> execute();
            }

        } catch (\PDOException $e){
            echo $e -> getMessage();
        }
    }
}