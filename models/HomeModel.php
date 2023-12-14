<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class HomeModel extends BaseModel
{
    function __construct()
    {
    }

    function getDescription()
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * 
            FROM DescriptionOfCompany";
            $stmt = $cxn->prepare($query);

            $stmt->execute();

            $result =  $stmt->fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row) {
                print($this->descrTemplate($row));
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getSpecialOffers()
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM ProductVariations PV
            INNER JOIN Product P ON PV.productID = P.productID
            INNER JOIN Category C ON P.FK_categoryID = C.categoryID 
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

    function getNews()
    {
        try {
            $cxn = parent::connectToDB();

            // Always get the 2 most recently added news
            $query = "SELECT * 
            FROM NewsInViews";
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

    // Templates

    function descrTemplate($row)
    {
        return $template = "

        <p> " . $row->compDescription . "</p> ";
    }

    function specialOffersTemplate($row)
    {
        $baseURL = BASE_URL;

        return $template = "
        <article class='product-w gap-50 margin-100'>
            
        
        <form method=POST action='{$baseURL}/Products?productID=" . $row->productID . "&variationID=" . $row->variationID . "'>
        <input type='hidden' name='productID' value=" . $row->productID . ">
            <input type='hidden' name='variationID' value=" . $row->variationID . ">    
        <div class='text-decoration-none product-card'>
                <img class='img-150 margin-30' src=" . $row->imgUrl . ">
                <h2 class='h2-black margin-15'>" . $row->productName . "</h2>
                <p class='margin-15 p-black'>" . $row->productDescription . " </p>
                <input type='submit' value='See more' name='See more' class='btn btn-outline-secondary'>
            </div>
        </form>
            
            <form method=POST action='{$baseURL}/views/shared/addToCartButton.php'>
            <input type='hidden' name='productID' value=" . $row->productID . ">
            <input type='hidden' name='variationID' value=" . $row->variationID . ">
            <input type='hidden' name='productName' value=" . $row->productName . ">
            <input type='hidden' name='price' value=" . $row->price . ">
            <input type='hidden' name='imgUrl' value=" . $row->imgUrl . ">    
            <div class='d-flex justify-content-center' style='margin-top:20px'>
                    <p class='font-weight-bold gap-50' style='margin-top:15px'>" . $row->price . " DKK </p>

                    <input value=Add type=submit name=add_to_cart class='btn btn-success'>
                </div>
            </form>
        </article>";
    }


    function newsTemplate($row)
    {
        return $template = "
        <div class='news-pink'>
            <h2 class = h2-red margin-15>" . $row->newsTitle . "</h2>
            <p class ='p-red'> " . $row->newsText . "</p> 
        </div>";
    }
}
