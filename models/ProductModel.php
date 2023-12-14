<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';
require_once __DIR__ . '/ShoppingCart.php';

use models\BaseModel;
use models\ShoppingCart;

class ProductModel extends BaseModel 
{
  

    function __construct()
    {
        
    }

    function getProductsByCategory($categoryID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT *
            FROM ProductVariations PV
            INNER JOIN Product P ON PV.productID = P.productID
            INNER JOIN Category C ON P.FK_categoryID = C.categoryID
            WHERE C.categoryID = :categoryID";
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

    function getProductsByCategoryAdmin($categoryID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM Product WHERE FK_categoryID = :categoryID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":categoryID", $categoryID);

            $stmt -> execute();
            $result =  $stmt -> fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row)
            {
                print($this->productTemplateAdmin($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function getProductsBySubcategory($categoryID, $subcategoryID)
    {
        try {
            $cxn = parent::connectToDB();

            // $query = "SELECT * FROM product WHERE FK_categoryID = :categoryID AND FK_subcategoryID = :subcategoryID";
            $query = "SELECT *
            FROM ProductVariations PV
            INNER JOIN Product P ON PV.productID = P.productID
            INNER JOIN Category C ON P.FK_categoryID = C.categoryID
            WHERE C.categoryID = :categoryID AND FK_subcategoryID = :subcategoryID";
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

    function getSingleProduct($productID, $variationID)
    {
        try {
            $cxn = parent::connectToDB();
             
            $query = "SELECT * FROM Product P
                        INNER JOIN ProductVariations PV ON P.productID = PV.productID
                        INNER JOIN Variations V ON PV.variationID = V.variationID
                        WHERE P.productID = :productID AND V.variationID = :variationID ";
            $stmt = $cxn->prepare($query);
            $stmt -> bindParam(":productID", $productID);
            $stmt -> bindParam(":variationID", $variationID);
            $stmt -> execute();
            $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row) {

                $row;

            }
        
                // Fetch variations for the product
                $queryVariations = "SELECT * FROM Variations V
                                    INNER JOIN ProductVariations PV ON V.variationID = PV.variationID
                                    WHERE PV.variationID != :variationID";
                $stmtVariations = $cxn->prepare($queryVariations);
                $stmtVariations -> bindParam(":variationID", $variationID);
                $stmtVariations -> execute();
                $variations = $stmtVariations->fetchAll(\PDO::FETCH_OBJ);

            print($this -> singleProductTemplate($row, $variations));
        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    // Shopping cart related methods
    function addToCart ($productID, $productName, $variationID, $quantity, $price, $imgUrl)
    {
        // Create an instance of ShoppingCart
        $cart = new ShoppingCart();

        // Call the necessary method to add product to the shopping cart
        $cart -> addToCart($productID, $productName, $variationID, $quantity, $price, $imgUrl);
    }

    function productTemplate($row)
    {
        $baseURL = BASE_URL;
        
        return $template = "
        <article class='product-w gap-50 margin-100'>
            <form method=POST action='{$baseURL}/views/shared/addToCartButton.php'>
            <input type='hidden' name='productID' value=" . $row->productID . ">
            <input type='hidden' name='variationID' value=" . $row->variationID . ">
            <input type='hidden' name='productName' value=" . $row->productName . ">
            <input type='hidden' name='price' value=" . $row->price . ">
            <input type='hidden' name='imgUrl' value=" . $row->imgUrl . ">
        
            <a class='text-decoration-none product-card' href='http://denisaneagu.com/CapWizards/Products?productID=". $row -> productID."&variationID=".$row -> variationID."'>
                <img class='img-150 margin-30' src=" . $row -> imgUrl . ">
                <h2 class='h2-black margin-15'>" . $row-> productName . "</h2>
                <p class='margin-15 p-black'>" . $row -> productDescription . " </p>
            </a>
            
                <div class='d-flex justify-content-center'>
                    <p class='font-weight-bold gap-50'>" . $row -> price . " DKK </p>

                    <input value=Add type=submit name=add_to_cart>
                </div>
            </form>
        </article>";
        
    }

    function productTemplateAdmin($row)
    {
        $baseURL = BASE_URL;
        
        return $template = "
        
        <article class='product-w gap-50 margin-100'>
            <a class='text-decoration-none product-card' href='http://denisaneagu.com/CapWizards/Products?productID=". $row -> productID ."'>
                <img class='img-150 margin-30' src=" . $row -> imgUrl . ">
                <h2 class='h2-black margin-15'>" . $row-> productName . "</h2>
                <p class='margin-15 p-black'>" . $row -> productDescription . " </p>
            </a>

            <div class='d-flex justify-content-center'>
                <p class='font-weight-bold gap-50'>" . $row -> price . " DKK </p>

                <form method='POST' action='{$baseURL}/Admin/Update-product'>
                <input type='hidden' name='productID' value=". $row -> productID .">
                <input value=Edit type=submit name=Edit class='btn btn-primary' style='height:35px; margin-right:15px'>
                </form>
                <a href='" . BASE_URL . "/controllers/AdminController.php?action=deleteProduct&productID=" . $row -> productID . "' class='btn btn-danger'>Delete</a>
            </div>
        </article>";
    }

    function singleProductTemplate($row, $variations)
    {
        return $template = "

        <form method=POST action='././views/shared/addToCartButton.php'>
                <div class='text-center'>
                    <img class='img-350 margin-30' src = ". $row -> imgUrl." alt= " .  $row -> altTxt.">
                    <h1 class='h1-black margin-50'>".  $row -> productName ."</h1>
                </div>
                <div class='d-flex justify-content-center justify-content-between'>
                        
                    <!-- Navigation tabs - Left side-->
                    <div class='col-7'>
                    <ul class='nav' id='myTab' role='tablist'>
                        <li class='margin-15 gap-15' role='presentation'>
                          <a class='nav-link active text-decoration-none h2-small tabs-a' href='#description' id='descr-tab' data-toggle='tab' data-target='#description' aria-controls='description' aria-selected='true'>Description</a>
                        </li>
                        <li role='presentation'>
                          <a class='nav-link text-decoration-none h2-small tabs-a'  href='#specification' id='specification-tab'  data-toggle='tab' data-target='#specification' aria-controls='specification' aria-selected='false'>Specification</a>
                        </li>
                      </ul>
                      <div class='tab-content' id='myTabContent'>
                        <div class='tab-pane active' id='description' role='tabpanel' aria-labelledby='descr-tab'>
                            <p class='p-black'>".$row -> productDescription ."</p>
                        </div>
                        <div class='tab-pane' id='specification' role='tabpanel' aria-labelledby='specification-tab'>
                            <table>
                                <tr class='p-black'>
                                    <td class='table-i-width'>Brand:</td>
                                    <td> ".$row -> brand ."</td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class='table-i-width'>Size:</td>
                                    <td>".$row -> size." </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class='table-i-width'>Color:</td>
                                    <td> ".$row -> color."</td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class='table-i-width'>Material:</td>
                                    <td> ".$row -> material ."</td>
                                </tr>
                            </table>
                        </div>
                        </div>
                    </div>

                <!-- Right side -->
               
                    <div class='col-4'>
                        <div class='row margin-15'>
                            <h2>".$row -> price." DKK</h2>
                        </div>
                        <div class='row margin-15'>
                        " . $this -> generateVariationsButtons($variations) . "
                             
                        </div>
                        <div class='row margin-30'>
                            <button class='minus' id='minus'>-</button>
                                <input class='amount text-center rounded-0' id='amount' type='text' value='1' input[type=number]>
                            <button class='plus' id='plus'>+</button>
                        </div>
                         
                            <div class='row'><input value=Add type=submit name=add_to_cart></div>
                        
                    </div>
                    
                </div>
            </div>
            </form>";
    }

    function generateVariationsButtons($variations)
{
    $buttons = '';

    foreach ($variations as $variation) {
        $buttons .= "<a class='c-variations' href='http://denisaneagu.com/CapWizards/Products?productID=".$variation->productID."&variationID=".$variation->variationID."'>C</a>";
    }

    return $buttons;
}


}