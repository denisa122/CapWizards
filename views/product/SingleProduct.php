<?php
require("./views/shared/header.php");


require_once "./models/ProductModel.php";

use models\ProductModel;

$SingleProductModel = new ProductModel();


$productID = isset($_POST['productID']) ? $_POST['productID'] : null;
$variationID = isset($_POST['variationID']) ? $_POST['variationID'] : null;

$brand = $SingleProductModel->getProductBrand($productID);

?>

<!-- Main -->
<main>
    <section class='product-info-section'>
        <div class="side-padding">

            <?php
            $SingleProductModel->getSingleProduct($productID, $variationID);
            ?>

        </div>
    </section>

    <!-- Recommended -->
    <section class="recommended-section text-center">
        <h1 class="h1-black margin-50">Recommended</h1>
        <div class="d-flex justify-content-center justify-content-between">
            <?php
            $baseURL = BASE_URL;

            // Recommended products based on brand
            $recommendedProducts = $SingleProductModel->getRecommendedProducts($brand, $productID);

            if ($recommendedProducts) {
                foreach ($recommendedProducts as $recommendedProduct) {
                    echo "
                <article>

                <form method=POST action='{$baseURL}/Products?productID=" . $recommendedProduct->productID . "&variationID=" . $recommendedProduct->variationID . "'>
                <input type='hidden' name='productID' value=" . $recommendedProduct->productID . ">
                <input type='hidden' name='variationID' value=" . $recommendedProduct->variationID . ">    
                <div class='text-decoration-none product-card'>
                        <img class='img-150 margin-30' src=" . $recommendedProduct->imgUrl . ">
                        <h2 class='h2-black margin-15'>" . $recommendedProduct->productName . "</h2>
                        <p class='margin-15 p-black'>" . $recommendedProduct->productDescription . " </p>
                        <input type='submit' value='See more' name='See more' class='btn btn-outline-secondary'>
                    </div>
                </form>

                <form method=POST action='{$baseURL}/views/shared/addToCartButton.php'>
                <input type='hidden' name='productID' value=" . $recommendedProduct->productID . ">
                <input type='hidden' name='variationID' value=" . $recommendedProduct->variationID . ">
                <input type='hidden' name='productName' value=" . $recommendedProduct->productName . ">
                <input type='hidden' name='price' value=" . $recommendedProduct->price . ">
                <input type='hidden' name='imgUrl' value=" . $recommendedProduct->imgUrl . ">    
                <div class='d-flex justify-content-center' style='margin-top:20px'>
                        <p class='font-weight-bold gap-50' style='margin-top:15px'>" . $recommendedProduct->price . " DKK </p>

                        <input value=Add type=submit name=add_to_cart class='btn btn-success'>
                    </div>
                </form>
                </article>
                ";
                }
            } else {
                echo "<div style='display:flex; flex-direction:column'>
                <h2>It seem like you are looking at a product that is unique within its brand.Don't miss out on more of our bottle cap brands!</h2>
                <a href='https://denisaneagu.com/CapWizards/Products/Alcoholic'>Explore more products from this category</a>
                </div>";
            }



            ?>
        </div>
    </section>
</main>

<?php
require("./views/shared/footer.php")
?>