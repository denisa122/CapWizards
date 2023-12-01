<?php
require("./views/shared/header.php") 
?>

<!-- Main -->
<main>
            <div class="side-padding"> 
            <section class="product-info-section">
                <div class="text-center">
                    <img class="img-350 margin-30" src = "/Assets/img/jul/Jul_oryginal.png">
                    <h1 class="h1-black margin-50">Ceres Jul</h1>
                </div>
                <div class="d-flex justify-content-center justify-content-between">
                        
                    <!-- Navigation tabs - Left side-->
                    <div class="col-7">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class=" margin-15 gap-15" role="presentation">
                          <a class="active text-decoration-none h2-small tabs-a" href="#description" id="descr-tab" data-toggle="tab" data-target="#description" aria-controls="description" aria-selected="true">Description</a>
                        </li>
                        <li class="" role="presentation">
                          <a class="text-decoration-none h2-small tabs-a " href="#specification" id="specification-tab"  data-toggle="tab" data-target="#specification" aria-controls="specification" aria-selected="false">Specification</a>
                        </li>
                      </ul>
                      <div class="tab-content " id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="descr-tab">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure neque labore corrupti nobis quo amet cumque nulla enim, magni eum saepe dolores voluptates? Quam deleniti rem consequuntur corporis non necessitatibus!</p>
                        </div>
                        <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                            <table>
                                <tr>
                                    <td class="table-i-width">Brand:</td>
                                    <td> </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="table-i-width">Size:</td>
                                    <td> </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="table-i-width">Color:</td>
                                    <td> </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="table-i-width">Material:</td>
                                    <td> </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="table-i-width">Condition:</td>
                                    <td> </td>
                                </tr>
                            </table>
                        </div>
                        </div>
                    </div>

                <!-- Right side -->
                    <div class="col-4">
                        <div class="row margin-15">
                            <h2>Price</h2>
                        </div>
                        <div class="row margin-15">
                            <button class="c-variations"></button>
                            <button class="c-variations"></button>
                            <button class="c-variations"></button>
                        </div>
                        <div class="row margin-30">
                            <button class="minus">-</button>
                                <input class="amount text-center rounded-0" id="amount" type="text" value="1" input[type=number]>
                            <button class="plus">+</button>
                        </div>
                        <div class="row"><a class="small-button-pink">Add to cart</a></div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    <!-- Recommended -->
    <section class="recommended-section text-center">
        <h1 class="h1-black margin-50">Recommended</h1>
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
    </main>

    <?php
require("./views/shared/footer.php") 
?>