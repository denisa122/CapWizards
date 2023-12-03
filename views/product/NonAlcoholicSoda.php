<?php

require("./views/shared/header.php"); 
require_once "./models/ProductModel.php";

use models\ProductModel;

$productModel = new ProductModel();

?>


<main>
    <section class="text-center categories-header margin-100 subcategories-yellow">
        <h1 class="h1-black">Soda</h1>
    </section>

<!-- Product grid -->
    <ul>
  <?php $productModel -> getProductsBySubcategory(2, 5); ?>
</ul>
</main>
</html>

<!-- For now it's empty bc we don't have any sodas in the database -->

<?php
require("./views/shared/footer.php") 
?>