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

    function getProductsByCategoryAdmin($categoryID)
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

    function getSingleProduct()
    {
        try {
            $cxn = parent::connectToDB();
             
            $query = "SELECT * FROM Product Where productID = :productID";
            $stmt = $cxn -> prepare($query);
            $stmt -> bindParam(":productID", $_GET['productID']);

            $stmt -> execute();
            $result =  $stmt -> fetchAll(\PDO::FETCH_OBJ);
            
            foreach ($result as $row)
            {
                print($this->singleProductTemplate($row));
            }

        } catch(\PDOException $e) {
            echo $e -> getMessage();
        }
    }

    function productTemplate($row)
    {
        return $template = "
        
        <article class='product-w gap-50 margin-100'>
            <a class='text-decoration-none product-card' href=http://localhost/CapWizards/Products/?productID=". $row -> productID .">
                <img class='img-150 margin-30' src=" . $row -> imgUrl . ">
                <h2 class='h2-black margin-15'>" . $row-> productName . "</h2>
                <p class='margin-15 p-black'>" . $row -> productDescription . " </p>
            </a>

            <div class='d-flex justify-content-center'>
                <p class='font-weight-bold gap-50'>" . $row -> price . " DKK </p>

                <a href=''><img src='/CapWizards/assets/svg/plus.svg' alt = 'Add to cart button'></a>
            </div>
        </article>";
        
    }

    function productTemplateAdmin($row)
    {
        return $template = "
        
        <article class='product-w gap-50 margin-100'>
            <a class='text-decoration-none product-card' href=http://localhost/CapWizards/Products/?productID=". $row -> productID .">
                <img class='img-150 margin-30' src=" . $row -> imgUrl . ">
                <h2 class='h2-black margin-15'>" . $row-> productName . "</h2>
                <p class='margin-15 p-black'>" . $row -> productDescription . " </p>
            </a>

            <div class='d-flex justify-content-center'>
                <p class='font-weight-bold gap-50'>" . $row -> price . " DKK </p>

                <a href='" . BASE_URL . "/Admin/Update-product?productID=" . $row->productID . "' class='btn btn-secondary'>Edit</a>
                <a href='" . BASE_URL . "/Controllers/AdminController.php?action=deleteProduct&productID=" . $row->productID . "' class='btn btn-danger'>Delete</a>
            </div>
        </article>";
    }

    function singleProductTemplate($row)
    {
        return $template = "

                <div class='text-center'>
                    <img class='img-350 margin-30' src = ".$row -> imgUrl." alt= ".$row -> altTxt.">
                    <h1 class='h1-black margin-50'>" .$row -> productName ."</h1>
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
                            <button class='c-variations'></button>
                            <button class='c-variations'></button>
                            <button class='c-variations'></button>
                        </div>
                        <div class='row margin-30'>
                            <button class='minus' id='minus'>-</button>
                                <input class='amount text-center rounded-0' id='amount' type='text' value='1' input[type=number]>
                            <button class='plus' id='plus'>+</button>
                        </div>
                        <div class='row'><a class='small-button-pink'>Add to cart</a></div>
                    </div>
                </div>
            </div>";
    }


}