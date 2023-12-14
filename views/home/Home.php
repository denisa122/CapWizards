<?php
require("./views/shared/header.php");

require_once "./models/HomeModel.php";
require_once "./models/ProductModel.php";

use models\HomeModel;
use models\ProductModel;

$homeModel = new HomeModel();
$productModel = new ProductModel();

?>

<main class="pt-0">
    <!--banner-->
    <section class="banner text-center">
        <img src="/CapWizards/assets/svg/Intro section.svg" alt="">
    </section>

    <!--About us-->
    <section class="text-center about-section">
        <h2 class="h1-green margin-50">About Us</h2>
        <?php $homeModel->getDescription(); ?>
    </section>

    <!--Categories-->
    <section class="d-flex justify-content-between categories-section text-center">
        <a href="http://denisaneagu.com/CapWizards/Products/Alcoholic" class="text-decoration-none">
            <img src="/CapWizards/assets/svg/beer.svg" alt="#">
            <h2>Alcoholic</h2>
        </a>

        <a href="http://denisaneagu.com/CapWizards/Products/Non-alcoholic" class="text-decoration-none">
            <img src="/CapWizards/assets/svg/nonAlcoholic.svg" alt="#">
            <h2>Non alcoholic</h2>
        </a>
    </section>

    <!--Daily offers-->
    <section class="dailyOffers-section text-center">
        <h1 class="h1-black margin-50">Special offers</h1>
        <div class="d-flex justify-content-center justify-content-between">
            <?php
            $homeModel->getSpecialOffers();
            ?>
        </div>
    </section>

    <!--News feed-->
    <article class="text-center">
        <h1 class="h1-black margin-50">News</h1>
        <div class="d-flex justify-content-center">
            <?php $homeModel->getNews() ?>
        </div>
    </article>
</main>

<?php
require("./views/shared/footer.php");
?>