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
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(":categoryID", $categoryID);

            $stmt->execute();

            $result =  $stmt->fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row) {
                print($this->productTemplate($row));
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getProductsByCategoryAdmin($categoryID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * 
            FROM Product 
            WHERE FK_categoryID = :categoryID";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(":categoryID", $categoryID);

            $stmt->execute();

            $result =  $stmt->fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row) {
                print($this->productTemplateAdmin($row));
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getProductsBySubcategory($categoryID, $subcategoryID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT *
            FROM ProductVariations PV
            INNER JOIN Product P ON PV.productID = P.productID
            INNER JOIN Category C ON P.FK_categoryID = C.categoryID
            WHERE C.categoryID = :categoryID AND FK_subcategoryID = :subcategoryID";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(":categoryID", $categoryID);
            $stmt->bindParam(":subcategoryID", $subcategoryID);

            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row) {
                print($this->productTemplate($row));
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
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

            $stmt->bindParam(":productID", $productID);
            $stmt->bindParam(":variationID", $variationID);

            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

            // Fetch variations for the product
            $queryVariations = "SELECT * FROM Variations V
            INNER JOIN ProductVariations PV ON V.variationID = PV.variationID
            WHERE PV.productID = :productID";
            $stmtVariations = $cxn->prepare($queryVariations);

            $stmtVariations->bindParam(":productID", $productID);

            $stmtVariations->execute();

            $variations = $stmtVariations->fetchAll(\PDO::FETCH_OBJ);

            foreach ($result as $row) {
                print($this->singleProductTemplate($row, $variations));
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getProductBrand($productID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT V.brand FROM ProductVariations PV
            INNER JOIN Variations V ON PV.variationID = V.variationID
            WHERE PV.productID = :productID";

            $stmt = $cxn->prepare($query);
            $stmt->bindParam(":productID", $productID);

            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $result['brand'] ?? null;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function getRecommendedProducts($brand, $currentProductID)
    {
        try {
            $cxn = parent::connectToDB();

            $query = "SELECT * FROM Product P
            INNER JOIN ProductVariations PV ON P.productID = PV.productID
            INNER JOIN Variations V ON PV.variationID = V.variationID
            WHERE V.brand = :brand AND P.productID <> :currentProductID LIMIT 3";
            $stmt = $cxn->prepare($query);

            $stmt->bindParam(":brand", $brand);
            $stmt->bindParam(":currentProductID", $currentProductID);

            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

            return $result;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    // Shopping cart related methods
    function addToCart($productID, $productName, $variationID, $quantity, $price, $imgUrl)
    {
        $cart = new ShoppingCart();
        $cart->addToCart($productID, $productName, $variationID, $quantity, $price, $imgUrl);
    }

    function productTemplate($row)
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

    function productTemplateAdmin($row)
    {
        $baseURL = BASE_URL;

        return $template = "
        
        <article class='product-w gap-50 margin-100'>
            <p class='text-decoration-none product-card'>
                <img class='img-150 margin-30' src=" . $row->imgUrl . ">
                <h2 class='h2-black margin-15'>" . $row->productName . "</h2>
                <p class='margin-15 p-black'>" . $row->productDescription . " </p>
            </p>

            <div class='d-flex justify-content-center'>
                <p class='font-weight-bold gap-50'>" . $row->price . " DKK </p>

                <form method='POST' action='{$baseURL}/Admin/Update-product'>
                <input type='hidden' name='productID' value=" . $row->productID . ">
                <input value=Edit type=submit name=Edit class='btn btn-primary' style='height:35px; margin-right:15px'>
                </form>
                <a href='" . BASE_URL . "/controllers/AdminController.php?action=deleteProduct&productID=" . $row->productID . "' class='btn btn-danger'>Delete</a>
            </div>
        </article>";
    }

    function singleProductTemplate($row, $variations)
    {
        $baseURL = BASE_URL;

        return $template = "

        <form method=POST action='././views/shared/addToCartButton.php'>
        <input type='hidden' name='productID' value=" . $row->productID . ">
        <input type='hidden' name='variationID' value=" . $row->variationID . ">
                <div class='text-center'>
                    <img class='img-350 margin-30' src = " . $row->imgUrl . " alt= " .  $row->altTxt . ">
                    <h1 class='h1-black margin-50'>" .  $row->productName . "</h1>
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
                            <p class='p-black'>" . $row->productDescription . "</p>
                        </div>
                        <div class='tab-pane' id='specification' role='tabpanel' aria-labelledby='specification-tab'>
                            <table>
                                <tr class='p-black'>
                                    <td class='table-i-width'>Brand:</td>
                                    <td> " . $row->brand . "</td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class='table-i-width'>Size:</td>
                                    <td>" . $row->size . " </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class='table-i-width'>Color:</td>
                                    <td> " . $row->color . "</td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class='table-i-width'>Material:</td>
                                    <td> " . $row->material . "</td>
                                </tr>
                            </table>
                        </div>
                        </div>
                    </div>

                <!-- Right side -->
               
                    <div class='col-4'>
                        <div class='row margin-15'>
                            <h2>" . $row->price . " DKK</h2>
                        </div>
                        <div class='row margin-15'>
                             
                        </div>                         
                        <form method=POST action='{$baseURL}/views/shared/addToCartButton.php'>
                        <input type='hidden' name='productID' value=" . $row->productID . ">
                        <input type='hidden' name='variationID' value=" . $row->variationID . ">
                        <input type='hidden' name='productName' value=" . $row->productName . ">
                        <input type='hidden' name='price' value=" . $row->price . ">
                        <input type='hidden' name='imgUrl' value=" . $row->imgUrl . ">    
                        <div class='d-flex justify-content-center' style='margin-top:20px'>
                                <input value=Add type=submit name=add_to_cart class='big-button' style='margin-left:-120px'>
                            </div>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
            </form>";
    }
}
