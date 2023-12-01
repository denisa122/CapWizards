<?php

require("./views/shared/header.php"); 
require_once "./models/ProductModel.php";

use models\ProductModel;

$productModel = new ProductModel();

?>


<main>
    <!-- Category header -->
    <section class="text-center categories-header">
        <h1 class="h1-black">Non alcoholic</h1>
    </section>

       <!-- Subcategories navigation -->
       <section class="d-flex subcategories-navigation text-center"> 
        <a class="col subcategories-red text-decoration-none" href="http://localhost/CapWizards/Products/Non-alcoholic/Soda">
            <img src="/CapWizards/assets/svg/soda.svg" alt="Soda icon">
            <h2 class="h2-bage">Soda</h2>
        </a>
        <a class="col subcategories-yellow text-decoration-none" href="http://localhost/CapWizards/Products/Non-alcoholic/Soft drink">
            <img src="" alt="Soft drink icon">
            <h2 class="h2-bage">Soft drink</h2>
        </a>
        <a class="col subcategories-blue text-decoration-none" href="http://localhost/CapWizards/Products/Non-alcoholic/Water">
            <img src="" alt="Water icon">
            <h2 class="h2-bage">Water</h2>
        </a>
        </section>

         <!-- Product grid -->
<ul>
  <?php $productModel -> getProductsByCategory(2); ?>
</ul>
</main>
</html>

<?php
require("./views/shared/footer.php") 
?>
