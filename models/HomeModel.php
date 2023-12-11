<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class HomeModel extends BaseModel 
{
    function __construct()
    {
        
    }

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
                print($this->descrTemplate($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function getSpecialOffers()
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM Product WHERE isSpecialOffer = 1";
            $stmt = $cxn -> prepare($query);
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

    function getNews()
    {
        try {
            $cxn = parent::connectToDB();

            // Always get the 2 most recently added news
            $query = "SELECT * FROM News order by newsDate desc limit 2";
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

    // Templates

    function descrTemplate($row)
    {
        return $template = "

        <p> ".$row -> compDescription."</p> ";
    }

    function specialOffersTemplate($row)
    {
        return $template = "
            <form method=POST action='././views/shared/addToCartButton.php'>
                <a class=text-decoration-none product-card href=>
                    <input class='hidden' name='productID' value= ".$row -> productID.">
                    <input type='hidden' name='orderID' value='".$_SESSION['orderID']."'>
                    <img class='img-150 margin-30' src = ".$row -> imgUrl." alt= ".$row -> altTxt.">
                    <h2 class='h2-black' margin-15>".$row -> productName."</h2>
                    <p class='margin-15 p-black'>
                        ".$row -> productDescription."
                    </p>
                </a>
                    <div class='d-flex justify-content-center'>
                        <p class='font-weight-bold gap-50'>".$row -> price." DKK</p>
                 
                        <input value=add_to_cart type=submit name=add_to_cart>
                    </div> 
            </form>";
    }


    function newsTemplate($row)
    {
        return $template = "
        <div class='news-pink'>
            <h2 class = h2-red margin-15>".$row -> newsTitle."</h2>
            <p class ='p-red'> ".$row -> newsText ."</p> 
        </div>";
    }
}