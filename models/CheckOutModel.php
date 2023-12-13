<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class CheckOutModel extends BaseModel
{

    function __construct()
    {
        
    }

    public function Checkout($productID, $variationID, $quantity, $price, $customerID, $firstName, $lastName, $email, $phoneNumber, $country, $city, $zipcode, $street, $houseNumber, $apartmentNumber){
        $cxn = parent::connectToDB();
        $cxn->beginTransaction();
    
        try {
            // Insert customer details
            $query = "INSERT INTO Customer (firstName, lastName, email, phoneNumber) VALUES (:firstName, :lastName, :userEmail, :phoneNumber)";
            $stmt = $cxn->prepare($query);
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':userEmail', $email);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->execute();
    
            $customerID = $cxn->lastInsertId();
    
            // Insert address details
            $query = "INSERT INTO Address (country, city, zipcode, street, houseNumber, apartmentNumber) VALUES (:country, :city, :zipcode, :street, :houseNumber, :apartmentNumber)";
            $stmt = $cxn->prepare($query);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':zipcode', $zipcode);
            $stmt->bindParam(':street', $street);
            $stmt->bindParam(':houseNumber', $houseNumber);
            $stmt->bindParam(':apartmentNumber', $apartmentNumber);
            $stmt->execute();
    
            $addressID = $cxn->lastInsertId();
    
            // Insert order details
            $query = "INSERT INTO `Order` (FK_customerID, FK_addressID) VALUES (:customerID, :addressID)";
            $stmt = $cxn->prepare($query);
            $stmt->bindParam(':customerID', $customerID);
            $stmt->bindParam(':addressID', $addressID);
            $stmt->execute();
    
            $orderID = $cxn->lastInsertId();
    
            // Insert product order details
            $query = "INSERT INTO ProductOrder (orderID, productID, quantity) VALUES (:orderID, :productID, :quantity)";
            $stmt = $cxn->prepare($query);
            $stmt->bindParam(':orderID', $orderID);
            $stmt->bindParam(':productID', $productID);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->execute();
    
            $cxn->commit();
            return true;
            
        } catch (\PDOException $e) {
            echo $e->getMessage();
            $cxn->rollback();
            return false;
        }
        
    } 

    function InvoiceTemplate($item){
        return $template = "
            <h2>Order completed!</h2>

            <h3>User Information</h3>
            <p>Name: {$item['firstName']} {$item['lastName']}</p>
            <p>Email: {$item['email']}</p>
            <p>Phone Number: {$item['phoneNumber']}</p>
            <p>Address: {$item['houseNumber']} {$item['street']}, Apartment: {$item['apartmentNumber']}, {$item['city']}, {$item['country']}, {$item['zipcode']}</p>


            <h2>Order Details</h2>
            <p>Order ID: {$item['orderID']}</p>
            <p>Product ID: {$item['productID']}</p>
            <p>Quantity: {$item['quantity']}</p>
        ";
    }


}