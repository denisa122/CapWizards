<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class ProductModel extends BaseModel 
{
  

    function __construct()
    {
        
    }

    function getProductsByCategory($categoryID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM product WHERE FK_categoryID = :categoryID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":categoryID", $categoryID);

            $stmt -> execute();
            $result =  $stmt -> fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row)
            {
                print($this->productTemplate($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function getProductsBySubcategory($categoryID, $subcategoryID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM product WHERE FK_categoryID = :categoryID AND FK_subcategoryID = :subcategoryID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":categoryID", $categoryID);
            $stmt -> bindParam(":subcategoryID", $subcategoryID);

            $stmt -> execute();
            $result = $stmt -> fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row)
            {
                print($this->productTemplate($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function productTemplate($row)
    {
        //TODO: Figure out how to display 3 products in a row for the products pages
        return $template = "
        
        <section class='side-padding text-center'>
        <div class='d-flex justify-content-center justify-content-between margin-100 container'>
        <div class='row'>
        <article class='product-w col-sm'>
        <a class='text-decoration-none product-card' href=''>
        <img class='img-150 margin-30' src=" . $row -> imgUrl . ">
        <h2 class='h2-black margin-15'" . $row-> productName . "</h2>
        <p class='margin-15'>" . $row -> productDescription . " </p>
        </a>

        <div class='d-flex justify-content-center'>
        <p class='font-weight-bold gap-50'>" . $row -> price . " DKK </p>

        <a href=''><img src='/CapWizards/assets/svg/plus.svg' alt = 'Add to cart button'></a>
        </div>
        </article>
        </div>
        </section>";
    }

}