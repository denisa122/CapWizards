<?php

require("./views/shared/header.php"); 
require_once "./models/ProductModel.php";

use models\ProductModel;

$productModel = new ProductModel();

?>

<main>
    <!-- Category header -->
    <section class="text-center categories-header">
        <h1 class="h1-black">All products available to customers</h1>
        <a class="btn btn-success" href="http://localhost/CapWizards/Admin/Add-product">Add product</a>
    </section>

<!-- Product grid -->
    <section class='side-padding text-center'>
        <div class='d-flex justify-content-center justify-content-between container'>
            <div class='row'>
                <?php $productModel -> getProductsByCategoryAdmin(1); ?>
                <?php $productModel -> getProductsByCategoryAdmin(2); ?>
            </div>
        </div>
    </section>
</main>

<?php
require("./views/shared/footer.php") 
?>
