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
        <p>Unfortunately, we are currently sold out of cider bottle caps.</p>
        <a href="http://denisaneagu.com/CapWizards/Products/Alcoholic">Explore other products from the same category</a>
    </section>
</main>

<?php
require("./views/shared/footer.php")
?>