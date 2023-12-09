<?php

require("./views/shared/header.php"); 
require_once "./models/ProductModel.php";

use models\ProductModel;

$productModel = new ProductModel();

?>


<main>
    <section class="text-center categories-header margin-100 subcategories-blue">
        <h1 class="h1-black">Shaker</h1>
    </section>

<!-- Product grid -->
<section class='side-padding text-center'>
        <div class='d-flex justify-content-center justify-content-between container'>
            <div class='row'>
                <?php $productModel -> getProductsBySubcategory(1, 3); ?>
            </div>
        </div>
    </section>
</main>
</html>

<?php
require("./views/shared/footer.php") 
?>
