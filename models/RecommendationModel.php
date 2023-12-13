<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class RecommendationModel extends BaseModel 
{
    function __construct()
    {
        
    }
    
    function getRecommended()
    {
        try {
            $cxn = parent::connectToDB();
            $query = "SELECT * FROM Product P
            JOIN ProductVariations PV ON P.productID = PV.productID
            JOIN Variations V ON PV.variationID = V.variationID
            WHERE P.color = 'green' AND  P.productID != :productID
            ORDER BY RAND()
            LIMIT 3"; 
            $stmt = $cxn ->prepare($query);
            $stmt -> bindParam(":productID", $_GET['productID']);
            $stmt -> execute();
            $recommendedProducts =  $stmt -> fetchAll(\PDO::FETCH_OBJ);

            
            foreach ($recommendedProducts as $row)
            {
                print($this -> getRecommendedProductsTemplate($row));
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return[];  // Return an empty array in case of an error
        }
    }



    function getRecommendedProductsTemplate($row)
    {
        return $template = "
            <form method=POST action='././views/shared/addToCartButton.php'>
                <article class='product-w'> 
                <a class=text-decoration-none product-card href='/CapWizards/Products/?productID=". $row -> productID ."&variationID= ".$row -> variationID."'>
                    <input class='hidden' name='productID' value= ".$row -> productID.">
                    <input type='hidden' name='variationID' value='" . $row -> variationID . "'>
                    <img class='img-150 margin-30' src = ".$row -> imgUrl." alt= ".$row -> altTxt.">
                    <h2 class='h2-black' margin-15>".$row -> productName."</h2>
                    <p class='margin-15 p-black'>
                        ".$row -> productDescription."
                    </p>
                </a>
                    <div class='d-flex justify-content-center'>
                        <p class='font-weight-bold gap-50'>".$row -> price." DKK</p>
                 
                        <input value=Add type=submit name=add_to_cart>
                    </div>
                </article>
            </form>";
    }
}
