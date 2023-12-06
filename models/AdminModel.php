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

            $query = "SELECT * FROM Company WHERE companyID = :companyID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":companyID", $companyID);

            $stmt -> execute();
            $result =  $stmt -> fetchAll(\PDO::FETCH_OBJ);
            
            foreach ($result as $row)
            {
                print($this->companyDescriptionTemplate($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function updateDescription($companyID, $compDescription)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "UPDATE Company SET compDescription = :compDescription WHERE companyID = :companyID";
            $stmt = $cxn -> prepare($query);

            $stmt -> bindParam("compDescription", $compDescription);
            $stmt -> bindParam("companyID", $companyID);

            $sanitized_description = htmlspecialchars($compDescription);
            $stmt -> bindParam("compDescription", $sanitized_description);

            $stmt -> execute();

            $cxn = null;

        } catch (\PDOException $e){
            echo $e -> getMessage();
        }
    }

    // Opening hours
    function getOpeningHours($companyID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM Company WHERE companyID = :companyID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":companyID", $companyID);

            $stmt -> execute();
            $result = $stmt -> fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row)
            {
                print($this->openingHoursTemplate($row));
            }

        }  catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function updateOpeningHours($companyID, $openingHours)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "UPDATE Company SET openingHours = :openingHours WHERE companyID = :companyID";
            $stmt = $cxn -> prepare($query);

            $stmt -> bindParam("openingHours", $openingHours);
            $stmt -> bindParam("companyID", $companyID);

            $sanitized_opening_hours = htmlspecialchars($openingHours);
            $stmt -> bindParam("openingHours", $sanitized_opening_hours);

            $stmt -> execute();

            $cxn = null;

        } catch (\PDOException $e){
            echo $e -> getMessage();
        }
    }

    // Contact information
    function getContactInfo($companyID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT email, phoneNumber FROM Company WHERE companyID = :companyID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":companyID", $companyID);

            $stmt -> execute();
            $result = $stmt -> fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row)
            {
                print($this->contactInfoTemplate($row));
            }

        }  catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    // News
    function getNews()
    {
        try {
            $cxn = parent::connectToDB();

            // Always get the 2 most recently added news
            $query = "SELECT * FROM News order by newsID desc limit 2";
            $stmt = $cxn -> prepare($query);

            $stmt -> execute();
            $result =  $stmt -> fetchAll(\PDO::FETCH_OBJ);
            
            foreach ($result as $row)
            {
                print($this->newsTemplate($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function createNews($newsTitle, $newsText)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "INSERT INTO News (newsTitle, newsText) VALUES (:newsTitle, :newsText)";
            $stmt = $cxn -> prepare($query);

            $stmt -> bindParam(":newsTitle", $newsTitle);
            $stmt -> bindParam(":newsText", $newsText);

            // TODO: Create trigger to assign newsDate to date of the day when creating it

            $stmt -> execute();

            $cxn = null;

        } catch (\PDOException $e){
            echo $e -> getMessage();
        }
    }

    function deleteNews($newsID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "DELETE FROM News WHERE newsID = :newsID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":newsID", $newsID);

            $stmt -> execute();

            $cxn = null;

        } catch (\PDOException $e){
            echo $e -> getMessage();
        }
    }

    function updateNews($newsID, $newsTitle, $newsText)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "UPDATE News SET newsTitle = :newsTitle, newsText = :newsText WHERE newsID = :newsID";
            $stmt = $cxn -> prepare($query);

            $stmt -> bindParam("newsTitle", $newsTitle);
            $stmt -> bindParam("newsText", $newsText);
            $stmt -> bindParam("newsID", $newsID);

            $sanitized_title = htmlspecialchars($newsTitle);
			$sanitized_text = htmlspecialchars($newsText);
            $stmt -> bindParam("newsTitle", $sanitized_title);
            $stmt -> bindParam("newsText", $sanitized_text);

            $stmt -> execute();

            $cxn = null;

        } catch (\PDOException $e){
            echo $e -> getMessage();
        }
    }

    // Special offers
    function getSpecialOffers($productID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM Product WHERE productID = :productID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":productID", $productID);

            $stmt -> execute();
            $result =  $stmt -> fetchAll(\PDO::FETCH_OBJ);
            
            foreach ($result as $row)
            {
                print($this->specialOffersTemplate($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }


    // Templates

    // Company description
    function companyDescriptionTemplate($row)
    {
        return $template = "

        <p class ='p-pink'> ".$row -> compDescription."</p> 
        <div>
        <a class='btn btn-secondary' href='" . BASE_URL . "/Admin/Update-description?companyID=" . $row->companyID . "'>Edit</a>
        </div>";
    }

    // Opening hours
    function openingHoursTemplate($row)
    {
        return $template = "

        <article class=margin-50>
        <tr> ".$row -> openingHours."</tr>
        <div>
        <a class='btn btn-secondary' href='" . BASE_URL . "/Admin/Update-opening-hours?companyID=" . $row->companyID . "'>Edit</a>
        </div>
        </article> 
         ";
    }

    // Contact information
    function contactInfoTemplate($row)
    {
        return $template = "

         <article>
            <table>
                <tr>
                    <td class=table-i-width>Email:</td>
                    <td> ".$row -> email." </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td class=table-i-width>Phone number:</td>
                    <td>".$row -> phoneNumber."</td>
                </tr>
            </table>
            <div>
            <a class='btn btn-secondary' href=''>Edit</a>
            </div>
        </article> ";
    }

    // News 
    function newsTemplate($row)
    {
        /**
         * We can't delete the news when we have just 2 in the db, since we are displaying the last 2 entries from the db;
         * TODO: Show error message when the user tries to delete news and there are only 2 in the db
         */
        
        return $template = "

        <h2 class = h2-pink margin-15>".$row -> newsTitle ."</h2>
        <p class ='p-pink'> ".$row -> newsText ."</p> 
        <div>
        <a class='btn btn-secondary' href='" . BASE_URL . "/Admin/Update-news?newsID=" . $row->newsID . "'>Edit</a>
        <a class='btn btn-danger' href='" . BASE_URL . "/Controllers/AdminController.php?action=deleteNews&newsID=" . $row->newsID . "'>Delete</a>
        </div>";
    }

    // Special offers
    function specialOffersTemplate($row)
    {
        return $template = "

                <a class=text-decoration-none product-card href=>
                    <img class=img-150 margin-30 src = ".$row -> imgUrl." alt= ".$row -> altTxt.">
                    <h2 class=h2-black margin-15>".$row -> productName."</h2>
                    <p class=margin-15>
                        ".$row -> productDescription."
                    </p>
                </a>
                    <div class=d-flex justify-content-center>
                        <p class=font-weight-bold gap-50>".$row -> price." DKK</p>
                 
                        <a href=><img src='/CapWizards/assets/svg/plus.svg' alt='Add to cart btn'></a>
                    </div> ";
    }
}