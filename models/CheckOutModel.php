<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class CheckOutModel extends BaseModel
{

    function __construct()
    {
    }

    public function calculateFinalPrice($cartItems)
    {
        // Hardcoded final price
        $finalPrice = 500;
        return $finalPrice;
    }

    public function placeOrder($customerData, $addressData, $cartItems)
    {
        try {
            $cxn = parent::connectToDB();

            $cxn->beginTransaction();

            // Insert customer details into Customer table
            $queryCustomer = "INSERT INTO Customer (firstName, lastName, email, phoneNumber) 
            VALUES (:firstName, :lastName, :email, :phoneNumber)";
            $stmtCustomer = $cxn->prepare($queryCustomer);

            $stmtCustomer->bindParam(":firstName", $customerData['firstName']);
            $stmtCustomer->bindParam(":lastName", $customerData['lastName']);
            $stmtCustomer->bindParam(":email", $customerData['email']);
            $stmtCustomer->bindParam(":phoneNumber", $customerData['phoneNumber']);

            $stmtCustomer->execute();

            // Retrieve the last inserted customerID
            $customerID = $cxn->lastInsertId();

            // Insert address details into the Address table
            $queryAddress = "INSERT INTO Address (country, city, zipcode, street, houseNumber, apartmentNumber)
            VALUES (:country, :city, :zipcode, :street, :houseNumber, :apartmentNumber)";
            $stmtAddress = $cxn->prepare($queryAddress);

            $stmtAddress->bindParam(":country", $addressData['country']);
            $stmtAddress->bindParam(":city", $addressData['city']);
            $stmtAddress->bindParam(":zipcode", $addressData['zipcode']);
            $stmtAddress->bindParam(":street", $addressData['street']);
            $stmtAddress->bindParam(":houseNumber", $addressData['houseNumber']);
            $stmtAddress->bindParam(":apartmentNumber", $addressData['apartmentNumber']);

            $stmtAddress->execute();

            // Retrieve the last inserted addressID
            $addressID = $cxn->lastInsertId();

            // Delivery method and paymentID are hardcoded
            $deliveryMethod = "PostNord";
            $paymentID = 1;

            // Insert order information into the `Order` table
            $queryOrder = "INSERT INTO `Order` (deliveryMethod, finalPrice, FK_customerID, FK_addressID, FK_paymentID)
            VALUES (:deliveryMethod, :finalPrice, :customerID, :addressID, :paymentID)";
            $stmtOrder = $cxn->prepare($queryOrder);

            $stmtOrder->bindParam(":deliveryMethod", $deliveryMethod);
            $stmtOrder->bindParam(":finalPrice", $this->calculateFinalPrice($cartItems));
            $stmtOrder->bindParam(":customerID", $customerID);
            $stmtOrder->bindParam(":addressID", $addressID);
            $stmtOrder->bindParam(":paymentID", $paymentID);

            $stmtOrder->execute();

            // Retrieve the last inserted orderID
            $orderID = $cxn->lastInsertId();

            // Insert individual products into the ProductOrder table
            foreach ($cartItems as $item) {
                $queryProductOrder = "INSERT INTO ProductOrder (quantity, price, productID, orderID)
                VALUES (:quantity, NULL, :productID, :orderID)";
                $stmtProductOrder = $cxn->prepare($queryProductOrder);

                $stmtProductOrder->bindParam(":quantity", $item['quantity']);
                $stmtProductOrder->bindParam(":productID", $item['productID']);
                $stmtProductOrder->bindParam(":orderID", $orderID);

                $stmtProductOrder->execute();
            }

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
}
