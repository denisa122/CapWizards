<?php
require("./views/shared/header.php");


require_once "./models/ProductModel.php";

use models\ProductModel;

$SingleProductModel = new ProductModel();

// Retrieve productID and variationID from the query parameters
// $productID = isset($_GET['productID']) ? $_GET['productID'] : null;
// $variationID = isset($_GET['variationID']) ? $_GET['variationID'] : null;

?>

<!-- Main -->
    <main>
        <section class='product-info-section'>
            <div class="side-padding">

                <?php 
                // echo "Product ID: " . $productID . "<br>";
                // echo "Variation ID: " . $variationID;
                    $SingleProductModel -> getSingleProduct();
                ?>
               
            </div>
        </section>
            
    <!-- Recommended -->
    <section class="recommended-section text-center">
        <h1 class="h1-black margin-50">Recommended</h1>
        <div class="d-flex justify-content-center justify-content-between">
            <article class="product-w"> 
                <a class="text-decoration-none product-card" href="">
                    <img class="img-150 margin-30" src="/Assets/img/breezer/Breezer_oryginal.png">
                    <h2 class="h2-black margin-15">Product name</h2>
                    <p class="margin-15">
                         Rutrum convallis lacus id a vulputate vitae commodo fames. 
                    </p>
                </a>
                    <div class="d-flex justify-content-center">
                        <p class="font-weight-bold gap-50">100 DKK</p>
                 
                        <a href=""><img src="/Assets/svg/plus.svg" alt="Add to cart button"></a>
                    </div>   
            </article>
          
            <article class="product-w"> 
                <a class="text-decoration-none product-card" href="">
                    <img class="img-150 margin-30" src="/Assets/img/breezer/Breezer_oryginal.png">
                    <h2 class="h2-black margin-15">Product name</h2>
                    <p class="margin-15">
                         Rutrum convallis lacus id a vulputate vitae commodo fames. 
                    </p>
                </a>
                    <div class="d-flex justify-content-center">
                        <p class="font-weight-bold gap-50">100 DKK</p>
                 
                        <a href=""><img src="/Assets/svg/plus.svg" alt="Add to cart button"></a>
                    </div>   
            </article>

            <article class="product-w"> 
                <a class="text-decoration-none product-card" href="">
                    <img class="img-150 margin-30" src="/Assets/img/breezer/Breezer_oryginal.png">
                    <h2 class="h2-black margin-15">Product name</h2>
                    <p class="margin-15">
                         Rutrum convallis lacus id a vulputate vitae commodo fames. 
                    </p>
                </a>
                    <div class="d-flex justify-content-center">
                        <p class="font-weight-bold gap-50">100 DKK</p>
                 
                        <a href=""><img src="/Assets/svg/plus.svg" alt="Add to cart button"></a>
                    </div>   
            </article>
        </div>
    </section>
    </main>

    <?php
require("./views/shared/footer.php") 
?>