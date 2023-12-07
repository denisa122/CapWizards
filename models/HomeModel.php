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

    // Templates

    function descrTemplate($row)
    {
        return $template = "

        <p class ='p-pink'> ".$row -> compDescription."</p> ";
    }

    function specialOffersTemplate($row)
    {
        return $template = "
                <a class=text-decoration-none product-card href=>
                    <input class=hidden name=product_id value= ".$row -> productID.">
                    <img class=img-150 margin-30 src = ".$row -> imgUrl." alt= ".$row -> altTxt.">
                    <h2 class=h2-black margin-15>".$row -> productName."</h2>
                    <p class=margin-15>
                        ".$row -> productDescription."
                    </p>
                </a>
                    <div class=d-flex justify-content-center>
                        <p class=font-weight-bold gap-50>".$row -> price." DKK</p>
                 
                        <input value=add_to_cart type=submit name=add_to_cart>
                    </div> ";
    }


    function newsTemplate($row)
    {
        return $template = "

        <h2 class = h2-pink margin-15>".$row -> newsTitle ."</h2>
        <p class ='p-pink'> ".$row -> newsText ."</p> ";
    }
}