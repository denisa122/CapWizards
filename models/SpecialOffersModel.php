<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class SpecialOffersModel extends BaseModel 
{
  

    function __construct()
    {
        
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
                 
                        <a href=><img src= alt=></a>
                    </div> ";
    }

}