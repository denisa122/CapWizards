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
        <p>Unfortunately, we are currently sold out of soft drink bottle caps.</p>
        <a href="http://localhost/CapWizards/Products/Non-alcoholic">Explore other products from the same category</a>
    </section>
</main>

<!-- For now it's empty bc we don't have any soft drinks in the database -->

<?php
require("./views/shared/footer.php") 
?>
