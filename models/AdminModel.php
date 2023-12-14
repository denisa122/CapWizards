<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class AdminModel extends BaseModel
{
    function __construct()
    {
    }

    // Company description 
    function getDescription($companyID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * 
            FROM Company 
            WHERE companyID = :companyID";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam("companyID", $companyID);

            $stmt->execute();

            $result =  $stmt->fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row) {
                print($this->companyDescriptionTemplate($row));
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function updateDescription($companyID, $compDescription)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "UPDATE Company 
            SET compDescription = :compDescription 
            WHERE companyID = :companyID";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam("compDescription", $compDescription);
            $stmt->bindParam("companyID", $companyID);

            $sanitized_description = htmlspecialchars($compDescription);
            $stmt->bindParam("compDescription", $sanitized_description);

            $stmt->execute();

            $cxn = null;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Extra company information
    function getExtraCompanyInfo($companyID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * 
            FROM Company 
            WHERE companyID = :companyID";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(":companyID", $companyID);

            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row) {
                print($this->extraCompanyInfo($row));
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function updateExtraCompanyInfo($companyID, $email, $openingHours, $phoneNumber)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "UPDATE Company 
            SET email = :email, openingHours = :openingHours, phoneNumber = :phoneNumber 
            WHERE companyID = :companyID";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":openingHours", $openingHours);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":companyID", $companyID);

            $sanitized_opening_hours = htmlspecialchars($openingHours);
            $sanitized_phone_number = htmlspecialchars($phoneNumber);
            $stmt->bindParam("openingHours", $sanitized_opening_hours);
            $stmt->bindParam("phoneNumber", $sanitized_phone_number);

            $stmt->execute();

            $cxn = null;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    // News
    function getNews()
    {
        try {
            $cxn = parent::connectToDB();

            // Always get the 2 most recently added news
            $query = "SELECT * 
            FROM News 
            ORDER BY newsDate DESC LIMIT 2";
            $stmt = $cxn->prepare($query);

            $stmt->execute();

            $result =  $stmt->fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row) {
                print($this->newsTemplate($row));
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function createNews($newsTitle, $newsText)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "INSERT INTO News (newsTitle, newsText) 
            VALUES (:newsTitle, :newsText)";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(":newsTitle", $newsTitle);
            $stmt->bindParam(":newsText", $newsText);

            $stmt->execute();

            $cxn = null;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function deleteNews($newsID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "DELETE FROM News 
            WHERE newsID = :newsID";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(":newsID", $newsID);

            $stmt->execute();

            $cxn = null;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function updateNews($newsID, $newsTitle, $newsText)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "UPDATE News 
            SET newsTitle = :newsTitle, newsText = :newsText 
            WHERE newsID = :newsID";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam("newsTitle", $newsTitle);
            $stmt->bindParam("newsText", $newsText);
            $stmt->bindParam("newsID", $newsID);

            $sanitized_title = htmlspecialchars($newsTitle);
            $sanitized_text = htmlspecialchars($newsText);
            $stmt->bindParam("newsTitle", $sanitized_title);
            $stmt->bindParam("newsText", $sanitized_text);

            $stmt->execute();

            $cxn = null;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Special offers
    function getSpecialOffers()
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * 
            FROM Product 
            WHERE isSpecialOffer = 1";
            $stmt = $cxn->prepare($query);

            $stmt->execute();

            $result =  $stmt->fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row) {
                print($this->specialOffersTemplate($row));
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function removeProductFromSpecialOffers($productID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "UPDATE Product 
            SET isSpecialOffer = 0 
            WHERE productID = :productID";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(":productID", $productID);

            $stmt->execute();

            $cxn = null;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function createSpecialOffer($productID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "UPDATE Product 
            SET isSpecialOffer = 1 
            WHERE productID = :productID";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(":productID", $productID);

            $stmt->execute();

            $cxn = null;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function updateProduct($productID, $productName, $productDescription, $price)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "UPDATE Product 
            SET productName = :productName, productDescription = :productDescription, price = :price 
            WHERE productID = :productID";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam("productName", $productName);
            $stmt->bindParam("productDescription", $productDescription);
            $stmt->bindParam("price", $price);
            $stmt->bindParam("productID", $productID);

            $sanitized_name = htmlspecialchars($productName);
            $sanitized_description = htmlspecialchars($productDescription);
            $stmt->bindParam("productName", $sanitized_name);
            $stmt->bindParam("productDescription", $sanitized_description);

            $stmt->execute();

            $cxn = null;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Create and delete new product
    function deleteProduct($productID)
    {
        try {
            $cxn = parent::connectToDB();

            // Start transaction
            $cxn->beginTransaction();

            // First, delete related rows from ProductVariations
            $deleteVariationsQuery = "DELETE FROM ProductVariations 
            WHERE productID = :productID";
            $stmtVariations = $cxn->prepare($deleteVariationsQuery);

            $stmtVariations->bindParam(':productID', $productID);

            $stmtVariations->execute();

            // Then, delete the product
            $deleteProductQuery = "DELETE FROM Product 
            WHERE productID = :productID";
            $stmtProduct = $cxn->prepare($deleteProductQuery);

            $stmtProduct->bindParam(':productID', $productID);

            $stmtProduct->execute();

            // Commit the transaction
            $cxn->commit();
        } catch (\PDOException $e) {
            // Rollback the transaction on error
            $cxn->rollBack();

            echo $e->getMessage();
        }
    }

    function createProduct($productName, $productDescription, $price, $size, $brand, $color, $availability, $imgUrl, $altTxt, $material, $isSpecialOffer, $FK_categoryID, $FK_subcategoryID, $variations)
    {
        try {
            $cxn = parent::connectToDB();

            // Start transaction
            $cxn->beginTransaction();

            // Insert into Product table
            $queryProduct = "INSERT INTO Product (productName, productDescription, price, size, brand, color, availability, imgUrl, altTxt, material, isSpecialOffer, FK_categoryID, FK_subcategoryID)
            VALUES (:productName, :productDescription, :price, :size, :brand, :color, :availability, :imgUrl, :altTxt, :material, :isSpecialOffer, :FK_categoryID, :FK_subcategoryID)";
            $stmtProduct = $cxn->prepare($queryProduct);

            $stmtProduct->bindParam(":productName", $productName);
            $stmtProduct->bindParam(":productDescription", $productDescription);
            $stmtProduct->bindParam(":price", $price);
            $stmtProduct->bindParam(":size", $size);
            $stmtProduct->bindParam(":brand", $brand);
            $stmtProduct->bindParam(":color", $color);
            $stmtProduct->bindParam(":availability", $availability);
            $stmtProduct->bindParam(":imgUrl", $imgUrl);
            $stmtProduct->bindParam(":altTxt", $altTxt);
            $stmtProduct->bindParam(":material", $material);
            $stmtProduct->bindParam(":isSpecialOffer", $isSpecialOffer);
            $stmtProduct->bindParam(":FK_categoryID", $FK_categoryID);
            $stmtProduct->bindParam(":FK_subcategoryID", $FK_subcategoryID);

            $stmtProduct->execute();

            // Get the last inserted productID
            $productID = $cxn->lastInsertId();

            // Insert into ProductVariations table
            foreach ($variations as $variationID) {
                $queryProductVariations = "INSERT INTO ProductVariations (variationID, productID) 
                VALUES (:variationID, :productID)";
                $stmtProductVariations = $cxn->prepare($queryProductVariations);

                $stmtProductVariations->bindParam(":variationID", $variationID);
                $stmtProductVariations->bindParam(":productID", $productID);

                $stmtProductVariations->execute();
            }

            // Commit the transaction
            $cxn->commit();
        } catch (\PDOException $e) {
            // Rollback the transaction on error
            $cxn->rollBack();

            echo $e->getMessage();
        }
    }



    // Templates

    // Company description
    function companyDescriptionTemplate($row)
    {
        $baseURL = BASE_URL;

        return $template = "

        <p class ='p-pink'> " . $row->compDescription . "</p> 
        <div>
        <form method='POST' action='{$baseURL}/Admin/Update-description'>
        <input type='hidden' name='companyID' value=" . $row->companyID . ">
        <input value=Edit type=submit name=Edit class='btn btn-primary' style='height:35px'>
        </form>
        </div>";
    }

    // Extra company details
    function extraCompanyInfo($row)
    {
        $baseURL = BASE_URL;

        return $template = "

        <article>
        <table>
           <tr>
               <td class='table-i-width'>Opening hours:</td>
               <td>" . $row->openingHours . "</td>
           </tr>
        </table>
           <table>
               <tr>
                   <td class='table-i-width'>Email:</td>
                   <td> " . $row->email . " </td>
               </tr>
           </table>
           <table>
               <tr>
                   <td class='table-i-width'>Phone number:</td>
                   <td>" . $row->phoneNumber . "</td>
               </tr>
           </table>
           <div>
           <form method='POST' action='{$baseURL}/Admin/Update-extra-info'>
           <input type='hidden' name='companyID' value=" . $row->companyID . ">
           <input value=Edit type=submit name=Edit class='btn btn-primary' style='height:35px'>
           </form>
           </div>
       </article> ";
    }


    // News 
    function newsTemplate($row)
    {
        /**
         * We can't delete the news when we have just 2 in the db, since we are displaying the last 2 entries from the db;
         */

        $baseURL = BASE_URL;

        return $template = "

        <h2 class = h2-pink margin-15>" . $row->newsTitle . "</h2>
        <p class ='p-pink'> " . $row->newsText . "</p> 
        <div style='display:flex'>
        <form method='POST' action='{$baseURL}/Admin/Update-news'>
        <input type='hidden' name='newsID' value=" . $row->newsID . ">
        <input value=Edit type=submit name=Edit class='btn btn-primary' style='height:35px; margin-right:15px'>
        </form>
        <a class='btn btn-danger' href='" . BASE_URL . "/controllers/AdminController.php?action=deleteNews&newsID=" . $row->newsID . "'>Delete</a>
        </div>";
    }

    // Special offers
    function specialOffersTemplate($row)
    {
        $baseURL = BASE_URL;

        return $template = "

                <p class=text-decoration-none product-card href=>
                    <img class=img-150 margin-30 src = " . $row->imgUrl . " alt= " . $row->altTxt . ">
                    <h2 class=h2-black margin-15>" . $row->productName . "</h2>
                    <p class=margin-15>
                        " . $row->productDescription . "
                    </p>
                </p>
                    <div class=d-flex justify-content-center>
                        <p class=font-weight-bold gap-50>" . $row->price . " DKK</p>
                    </div> 
                    <div style='margin-bottom:60px; display:flex; justify-content:center'>
                    <form method='POST' action='{$baseURL}/Admin/Update-product'>
                    <input type='hidden' name='productID' value=" . $row->productID . ">
                    <input value=Edit type=submit name=Edit class='btn btn-primary' style='height:35px; margin-right:15px'>
                    </form>
                        <a class='btn btn-danger' href='" . BASE_URL . "/controllers/AdminController.php?action=removeProductFromSpecialOffers&productID=" . $row->productID . "'>Remove from special offers</a>
                    </div>";
    }
}
