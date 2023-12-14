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
        <a class="col subcategories-red text-decoration-none" href="http://denisaneagu.com/CapWizards/Products/Non-alcoholic/Soda">
            <img src="/CapWizards/assets/svg/soda-drink.svg" alt="Soda icon">
            <h2 class="h2-bage">Soda</h2>
        </a>
        <a class="col subcategories-yellow text-decoration-none" href="http://denisaneagu.com/CapWizards/Products/Non-alcoholic/Soft-drink">
            <img src="/CapWizards/assets/svg/soft-drink.svg" alt="Soft drink icon">
            <h2 class="h2-bage">Soft drink</h2> <!-- We don;t have an icon for this -->
        </a>
        <a class="col subcategories-blue text-decoration-none" href="http://denisaneagu.com/CapWizards/Products/Non-alcoholic/Water">
            <img src="/CapWizards/assets/svg/water.svg" alt="Water icon">
            <h2 class="h2-bage">Water</h2> <!-- We don;t have an icon for this -->
        </a>
    </section>

    <!-- Product grid -->
    <section class='side-padding text-center'>
        <div class='d-flex justify-content-center justify-content-between container'>
            <div class='row'>
                <?php $productModel->getProductsByCategory(2); ?>
            </div>
        </div>
    </section>
</main>

<?php
require("./views/shared/footer.php")
?>