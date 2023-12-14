<?php

require("./views/shared/header.php");
require_once "./models/ProductModel.php";

use models\ProductModel;

$productModel = new ProductModel();

?>

<main>
    <section class="text-center categories-header">
        <a href="http://denisaneagu.com/CapWizards/Admin" style="margin-left: -900px;">Go back to admin panel</a>
        <h1 class="h1-black">All products available to customers</h1>
        <a class="btn btn-success" href="http://denisaneagu.com/CapWizards/Admin/Add-product">Add product</a>
    </section>

    <!-- Product grid -->
    <section class='side-padding text-center'>
        <div class='d-flex justify-content-center justify-content-between container'>
            <div class='row'>
                <?php $productModel->getProductsByCategoryAdmin(1); ?>
                <?php $productModel->getProductsByCategoryAdmin(2); ?>
            </div>
        </div>
    </section>
</main>

<?php
require("./views/shared/footer.php")
?>