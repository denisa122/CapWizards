<?php

require("./views/shared/header.php"); 
require_once "./models/ProductModel.php";

use models\ProductModel;

$productModel = new ProductModel();

?>


<main>
    <!-- Category header -->
    <section class="text-center categories-header">
        <h1 class="h1-black">Alcoholic</h1>
    </section>

       <!-- Subcategories navigation -->
       <section class="d-flex subcategories-navigation text-center"> 
        <a class="col subcategories-red text-decoration-none" href="http://localhost/CapWizards/Products/Alcoholic/Cider">
            <img src="/CapWizards/assets/svg/cider.svg" alt="Cider bottle and glass icon">
            <h2 class="h2-bage">Cider</h2>
        </a>
        <a class="col subcategories-yellow text-decoration-none" href="http://localhost/CapWizards/Products/Alcoholic/Beer">
            <img src="/CapWizards/assets/svg/beer-bage.svg" alt="Beer glass icon">
            <h2 class="h2-bage">Beer</h2>
        </a>
        <a class="col subcategories-blue text-decoration-none" href="http://localhost/CapWizards/Products/Alcoholic/Shaker">
            <img src="/CapWizards/assets/svg/mixer.svg" alt="Shaker glass icon">
            <h2 class="h2-bage">Shaker</h2>
        </a>
        <a class="col subcategories-pink text-decoration-none" href="http://localhost/CapWizards/Products/Alcoholic/Wine">
            <img src="/CapWizards/assets/svg/vine.svg" alt="Wine glass icon">
            <h2 class="h2-bage">Wine</h2>
        </a>
        </section>

<!-- Product grid -->
<ul>
  <?php $productModel -> getProductsByCategory(1); ?>
</ul>
</main>
</html>

<?php
require("./views/shared/footer.php") 
?>