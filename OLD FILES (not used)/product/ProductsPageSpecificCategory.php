<?php
require("./views/shared/header.php");
?>

<!-- Main -->
<main class="pt-0">
    <!-- Categories header -->
    <section class="text-center categories-header">
        <h1 class="h1-black">alcoholic</h1>
    </section>

    <!-- Subcategories navigation -->
    <section class="d-flex subcategories-navigation text-center"> 
        <a class="col subcategories-red text-decoration-none" href="">
            <img src="/Assets/svg/cider.svg" alt="Cider bottle and glass icon">
            <h2 class="h2-bage">Cider</h2>
        </a>
        <a class="col subcategories-yellow text-decoration-none" href="">
            <img src="/Assets/svg/beer-bage.svg" alt="Beer glass icon">
            <h2 class="h2-bage">Beer</h2>
        </a>
        <a class="col subcategories-blue text-decoration-none" href="">
            <img src="/Assets/svg/mixer.svg" alt="Shaker glass icon">
            <h2 class="h2-bage">Shaker</h2>
        </a>
        <a class="col subcategories-pink text-decoration-none" href="">
            <img src="/Assets/svg/vine.svg" alt="Wine glass icon">
            <h2 class="h2-bage">Wine</h2>
        </a>
        </section>

    <!-- Product grid -->

    <?php foreach ($alcoholicProducts as $product): ?>
        <article>
            <a class="text-decoration-none product-card" href="">
                <img class="img-150 margin-30" src="<?php echo $product['imgUrl']; ?>">
                <h2 class="h2-black margin-15"><?php echo $product['productName']; ?></h2>
                <p class="margin-15">
                 <?php echo $product['productDescription']; ?> 
                </p>
            </a>
            <div class="d-flex justify-content-center">
                <p class="font-weight-bold gap-50"><?php echo $product['price']; ?></p>

                <a href=""><img src="/Assets/svg/plus.svg" alt="Add to cart button"></a>
            </div>
        </article>
    <?php endforeach; ?> 

    <section class="side-padding text-center">
        <div class="d-flex justify-content-center justify-content-between margin-100">
        <?php foreach ($products as $product): ?>
        <article>
            <a class="text-decoration-none product-card" href="">
                <img class="img-150 margin-30" src="<?php echo $product['imgUrl']; ?>">
                <h2 class="h2-black margin-15"><?php echo $product['productName']; ?></h2>
                <p class="margin-15">
                 <?php echo $product['productDescription']; ?> 
                </p>
            </a>
            <div class="d-flex justify-content-center">
                <p class="font-weight-bold gap-50"><?php echo $product['price']; ?></p>

                <a href=""><img src="/Assets/svg/plus.svg" alt="Add to cart button"></a>
            </div>
        </article>
    <?php endforeach; ?>
        </div>
        <!-- <div class="d-flex justify-content-center justify-content-between margin-100">
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
        <div class="d-flex justify-content-center justify-content-between margin-100">
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
    </div> -->
    <div class="text-center "><a class="small-button-yellow">Load more</a></div>
    </section>
</main>

<?php
require("./views/shared/footer.php") 
?>