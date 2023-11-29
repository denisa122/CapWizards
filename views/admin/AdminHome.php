<?php
require("./views/shared/header.php") 
?>

<!-- Main -->
<main>
    <div class="side-padding input-rounded">
    <!-- Company description -->
        <section class="margin-100">
            <h1 class="margin-50 text-center h1-black">Company description</h1>
            <div class="d-flex justify-content-between">
                <textarea class=" compDescr-box">Bottle Cap Enthusiasts, Magic initiates, And Lizard Pioneers of imagination! Here at Web Cap Wizards  we provide you with a collectibles needed to your personal caps collection, new project or just another game in Caps! Unleash your powers, as did we when brainstorming for a unique web shop, that will not only grant us passing grade for semester project but give another life for the pop-top gems we've assembled during our university journey!</textarea>
                <div class="S-C-button-p">
                    <button class="S-C-buttons">Save</button>
                    <button class="S-C-buttons">Cancel</button>
                </div>
            </div>
        </section>
    <!-- Opening hours -->
        <section class="margin-100">
            <h1 class="margin-50 text-center h1-black">Opening hours</h1>
            <div class="d-flex justify-content-between">
                <input  class="input-size-b" type="text"  name="openingHours" value="We are open 24/7">
                <div class="text-right">
                    <button class="S-C-buttons">Save</button>
                    <button class="S-C-buttons">Cancel</button>
                </div>
            </div>
        </section>
    <!-- Contact information -->
        <section class="margin-100">
            <h1 class="margin-50 text-center h1-black">Contact information</h1>
                        <label for="email">Email:</label>
                        <input class="email-m" type="email"  name="email" value="capwizzards@lizards.com">
                        <label for="phoneNumber">Phone number:</label>
                        <input type="text"  name="phoneNumber" value="000900">
                <div class="text-right col">
                    <button class="S-C-buttons">Save</button>
                    <button class="S-C-buttons">Cancel</button>
                </div>
            
        </section>
    <!-- News -->
        <section class="margin-100">
            <h1 class="margin-50 text-center h1-black">News</h1>
            <div class="d-flex margin-15">
                <div class="text-center">
                    <input class="margin-15 input-T-width" type="text" name="newsTitle" value="NEW SODA SEALERS COMING SOON">
                    <textarea class="news-box" name="news" id="">Our Gecko Sage Seer foresaw a new set of wonders coming in to our store! With great pleasure we can announce a new drop coming soon!It will include various caps collected form the Christmas bottles within different countries!
                    </textarea>
                </div>
                <div class="text-center"> 
                    <input class=" margin-15 input-T-width" type="text" value="ONLINE SHOP BACK ON TRACK!">
                    <textarea class="news-box" name="news" id="">After recent wave interference we struggled with several issues, but it should bother you no more! All the delayed purchases should be shipped shortly and arrive till the end of November!</textarea>
                </div>
            </div>
            <div class="text-right">
                <button class="S-C-buttons">Save</button>
                <button class="S-C-buttons">Cancel</button>
            </div>
        </section>
    </div>
    <!-- Daily offers -->
        <section class="dailyOffers-section-admin text-center"> 
            <h1 class="margin-50 text-center h1-black">Daily offers</h1>
            <div class="d-flex justify-content-center justify-content-between">
                <article class="product-w">
                    <img class="img-150 margin-30" src="" alt="">
                    <input class="margin-5" type="text"  name="productName" value="Product name">
                    <textarea class="margin-5 textarea-descr" name="description" id="">Description</textarea>
                    <input class="margin-15" type="text"  name="price" value="100 DKK">
                    <div class="d-flex justify-content-end">
                        <button class="S-C-buttons">Save</button>
                        <button class="S-C-buttons">Cancel</button>
                    </div>
                </article>
                <article class="product-w">
                    <img class="img-150 margin-30" src="" alt="">
                    <input class="margin-5" type="text"  name="productName" value="Product name">
                    <textarea class="margin-5 textarea-descr" name="description" id="">Description</textarea>
                    <input class="margin-15" type="text"  name="price" value="100 DKK">
                    <div class="d-flex justify-content-end">
                        <button class="S-C-buttons">Save</button>
                        <button class="S-C-buttons">Cancel</button>
                    </div>
                </article>
                <article class="product-w">
                    <img class="img-150 margin-30" src="" alt="">
                    <input class="margin-5" type="text"  name="productName" value="Product name">
                    <textarea class="margin-5 textarea-descr" name="description" id="D">Description</textarea>
                    <input class="margin-15" type="text"  name="price" value="100 DKK">
                    <div  class="d-flex justify-content-end">
                        <button class="S-C-buttons">Save</button>
                        <button class="S-C-buttons">Cancel</button>
                    </div>
                </article>
            </div>
        </section>
    </main>

    
<?php
require("./views/shared/footer.php") 
?>
 