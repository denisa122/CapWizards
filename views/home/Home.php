<?php
require("./views/shared/header.php");
require_once "./models/NewsModel.php";
require_once "./models/CompanyModel.php";

use models\NewsModel;
use  models\DescriptionModel;

$newsModel = new NewsModel();
$descriptionModel = new DescriptionModel();

?>

    <main class="pt-0">
    <!--banner-->
    <section class="banner text-center">
        <img src="/Assets/svg/Intro section.svg" alt="">
    </section>

    <!--About us-->
    <section class="text-center about-section">
        <h2 class="h1-green margin-50">About Us</h2>
        <?php $descriptionModel -> getDescription(1) ?>
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
        <h1 class="h1-black margin-50">Daily offers</h1>
        <div class="d-flex justify-content-center justify-content-between">
            <article class="product-w"> 
                <a class="text-decoration-none product-card" href="">
                    <img class="img-150 margin-30" src="/Assets/img/breezer/Breezer_oryginal.png">
                    <h2 class="h2-black margin-15">Product name</h2>
                    <p class="margin-15">
                         Rutrum convallis lacus id a vulputate vitae commodo fames. 
                    </p>
                </a>
                    <div class="d-flex justify-content-center">
                        <p class="font-weight-bold gap-50">100 DKK</p>
                 
                        <a href=""><img src="/Assets/svg/plus.svg" alt="Add to cart button"></a>
                    </div>   
            </article>
          
            <article class="product-w"> 
                <a class="text-decoration-none product-card" href="">
                    <img class="img-150 margin-30" src="/Assets/img/breezer/Breezer_oryginal.png">
                    <h2 class="h2-black margin-15">Product name</h2>
                    <p class="margin-15">
                         Rutrum convallis lacus id a vulputate vitae commodo fames. 
                    </p>
                </a>
                    <div class="d-flex justify-content-center">
                        <p class="font-weight-bold gap-50">100 DKK</p>
                 
                        <a href=""><img src="/Assets/svg/plus.svg" alt="Add to cart button"></a>
                    </div>   
            </article>

            <article class="product-w"> 
                <a class="text-decoration-none product-card" href="">
                    <img class="img-150 margin-30" src="/Assets/img/breezer/Breezer_oryginal.png">
                    <h2 class="h2-black margin-15">Product name</h2>
                    <p class="margin-15">
                         Rutrum convallis lacus id a vulputate vitae commodo fames. 
                    </p>
                </a>
                    <div class="d-flex justify-content-center">
                        <p class="font-weight-bold gap-50">100 DKK</p>
                 
                        <a href=""><img src="/Assets/svg/plus.svg" alt="Add to cart button"></a>
                    </div>   
            </article>
        </div>
    </section>
    
    <!--News feed-->
    <article class="text-center">
        <h1 class="h1-black margin-50">News</h1>
        <div class="d-flex justify-content-center">
            <div class="news-pink">
            <?php $newsModel -> getNews(1) ?>
            </div>
            <div class="news-blue">
            <?php $newsModel -> getNews(2) ?>
            </div>
        </div>
    </article>
</main>

<?php
require("./views/shared/footer.php")
?>