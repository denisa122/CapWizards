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

    function getNews($newsID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM News WHERE newsID = :newsID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":newsID", $newsID);

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

    function newsTemplate($row)
    {
        return $template = "

        <h2 class = h2-pink margin-15>".$row -> newsTitle ."</h2>
        <p class ='p-pink'> ".$row -> newsText ."</p> ";
    }
}