<!-- Main -->
    <main class="pt-0">
    <!--banner-->
    <section class="banner text-center">
        <img src="/Assets/svg/Intro section.svg" alt="">
    </section>

    <!--About us-->
    <section class="text-center about-section">
        <h2 class="h1-green margin-50">About Us</h2>
        <p class="font-weight-bold">Bottle Cap Enthusiasts,<br>
            Magic initiates,<br>
            And Lizard Pioneers of imagination!</p>
        <p>Here at Web Cap Wizards we provide you with a collectibles 
            needed to your personal caps collection, new project or just 
            an other game in Caps!</p>
        <p>Unleash your powers, as did we when brainstorming for a 
            unique web shop, that will not only grant us passing grade for 
            semester project but give another life for the pop-top gems 
            we've assembled during our university journey!</p>
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
                <h2 class="h2-red margin-15">NEWs 1</h2>
                <p class="p-red">Our Gecko Sage Seer foresaw a new set of wonder’s coming in to our store! With great pleasure we can announce new drop coming soon!
                It will include various caps collected form the Christmas bottles within different countries!</p><!--implement text-->
            </div>
            <div class="news-blue">
                <h2 class="h2-pink margin-15">News 2</h2><!--implement news title-->
                <p class="p-pink">After recent wave interference we struggled with several issues but it should bother you no more!All the delayed purchases should be shipped shortly and arrive till the end of November!</p><!--implement text-->
            </div>
        </div>
    </article>
</main>

<!-- Footer -->
  <footer>
    <div class="row footer-grid">
    <section class="col section-padding ">
        <!-- opening hours -->
        <article class="margin-50">
            <h2 class="h2-small">We are open 24/7</h2>
        </article>
        <!-- Contact information -->
        <article>
            <h2 class="h2-small margin-30">Do (not) hesitate to contact our team of Mystic Scaly Spellwavers with any questions and other matters :D</h2>
            <table>
                <tr>
                    <td class="table-i-width">Email:</td>
                    <td>capwizzards@lizards.com</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td class="table-i-width">Phone number:</td>
                    <td>000900</td>
                </tr>
            </table>
        </article>
    </section>
    <!-- Contact us form -->
    <!DOCTYPE html>
        <section class="col">
        <h2 class="h2-yellow margin-15">Contact us</h2>
        <div class="col">
        <form action="contactForm.php" method="post">
            <div class="row margin-15">
                <input class="input-color input-size-s gap-15" type="text"  name="firstName" placeholder="First name">
                <input class="input-color input-size-s" type="text"  name="lastName" placeholder="Last name">
            </div>
            <div class="row margin-15">
                <input class="input-color input-size-s gap-15" type="email"  name="email" placeholder="Email">
                <input class="input-color input-size-s" type="text"  name="subject" placeholder="Subject">
            </div>
                
            <textarea class="input-color row margin-15 input-size-b" name="Message" placeholder="Message..."></textarea>
            <div class="row text-center form-button-wrapper"><input class="big-button form-button" type="submit" placeholder="Get in touch"></div>
        </form>
        </div>
        </section>
</html>

    </div>
  </footer>
</body>
</html>