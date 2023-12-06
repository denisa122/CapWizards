<?php
require("./views/shared/header.php");

require_once "./models/HomeModel.php";

use models\HomeModel;


$homeModel = new HomeModel();

?>

    <main class="pt-0">
    <!--banner-->
    <section class="banner text-center">
        <img src="/Assets/svg/Intro section.svg" alt="">
    </section>

    <!--About us-->
    <section class="text-center about-section">
        <h2 class="h1-green margin-50">About Us</h2>
        <?php $homeModel -> getDescription(1); ?>
    </section>

    <!--Categories-->
    <section class="d-flex justify-content-between categories-section text-center">
        <a href="" class="text-decoration-none">
            <img src="/Assets/svg/beer.svg" alt="#">
            <h2>Alcoholic</h2>
        </a>

        <a href="" class="text-decoration-none">
            <img src="/Assets/svg/nonAlcoholic.svg" alt="#">
            <h2>Non alcoholic</h2>
        </a>
    </section>

    <!--Daily offers-->
    <section class="dailyOffers-section text-center">
        <h1 class="h1-black margin-50">Special offers</h1>
        <div class="d-flex justify-content-center justify-content-between">
            <article class="product-w"> 
            <?php $homeModel -> getSpecialOffers(10) ?>
            </article>
                
            <article class="product-w"> 
            <?php $homeModel -> getSpecialOffers(5) ?>
            </article>
                
            <article class="product-w"> 
                <?php $homeModel -> getSpecialOffers(17) ?>  
            </article>
        </div>
    </section>
    
    <!--News feed-->
    <article class="text-center">
        <h1 class="h1-black margin-50">News</h1>
        <div class="d-flex justify-content-center">
            <div class="news-pink">
            <?php $homeModel -> getNews(1) ?>
            </div>
            <div class="news-blue">
            <?php $homeModel -> getNews(2) ?>
            </div>
        </div>
    </article>
</main>

<?php
require("./views/shared/footer.php")
?>