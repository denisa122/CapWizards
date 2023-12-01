<?php

require("./views/shared/header.php"); 
require_once "./models/ProductModel.php";

use models\ProductModel;

$productModel = new ProductModel();

?>


<main>
    <section class="text-center categories-header margin-100 subcategories-yellow">
        <h1 class="h1-black">Beer</h1>
    </section>

<!-- Product grid -->
    <ul>
  <?php $productModel -> getProductsBySubcategory(1, 2); ?>
</ul>
</main>
</html>

<?php
require("./views/shared/footer.php") 
?>
