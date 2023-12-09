<?php

require("./views/shared/header.php"); 
require_once "./models/ProductModel.php";

use models\ProductModel;

$productModel = new ProductModel();

?>


<main>
    <section class="text-center categories-header margin-100 subcategories-yellow">
        <h1 class="h1-black">Soft Drink</h1>
    </section>

<!-- Product grid -->
    <section class='side-padding text-center'>
        <div class='d-flex justify-content-center justify-content-between container'>
            <div class='row'>
                <?php $productModel -> getProductsBySubcategory(2, 6); ?>
            </div>
        </div>
    </section>
</main>
</html>

<!-- For now it's empty bc we don't have any soft drinks in the database -->

<?php
require("./views/shared/footer.php") 
?>
