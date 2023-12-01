<?php

require("./views/shared/header.php"); 
require_once "./models/ProductModel.php";

use models\ProductModel;

$productModel = new ProductModel();

?>


<main>
    <section class="text-center categories-header margin-100 subcategories-yellow">
        <h1 class="h1-black">Water</h1>
    </section>

<!-- Product grid -->
    <ul>
  <?php $productModel -> getProductsBySubcategory(2, 7); ?>
</ul>
</main>
</html>

<!-- For now it's empty bc we don't have any waters in the database -->

<?php
require("./views/shared/footer.php") 
?>
