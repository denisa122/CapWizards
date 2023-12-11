<?php
require("./views/shared/header.php");

require_once "./models/AdminModel.php";
require_once "./models/FooterModel.php";

use models\AdminModel;
use models\FooterModel;

$adminModel = new AdminModel();
$FooterInfoModel = new FooterModel();
?>

<!-- Main -->
<main>
    <div class="side-padding input-rounded">

    <!-- Company description -->
        <section class="margin-100">
            <h1 class="margin-50 text-center h1-black">Company description</h1>
            <div class="d-flex justify-content-between">
                <?php $adminModel -> getDescription(1); ?>
            </div>
        </section>

    <!-- Extra company details -->
        <section class="margin-100">
            <h1 class="margin-50 text-center h1-black">Other details</h1>
            <div class="d-flex justify-content-between">
               <?php $adminModel -> getExtraCompanyInfo(1); ?>
            </div>
        </section>

    <!-- News -->
        <section class="margin-100">
        <h1 class="margin-50 text-center h1-black">News</h1>
        <a class="btn btn-success" href="http://localhost/CapWizards/Admin/Add-news">Add news</a>
        <div class="d-flex justify-content-center">
            <div>
            <?php $adminModel -> getNews() ?>
            </div>
        </div>
    </article>
        </section>
    </div>
    
    <!-- Daily offers -->
    <section class="dailyOffers-section text-center">
        <h1 class="h1-black margin-50">Special offers</h1>
        <div class="d-flex justify-content-center justify-content-between">
            <article class="product-w"> 
            <?php $adminModel -> getSpecialOffers(10) ?>
            <div class="text-right">
                <button class="btn btn-secondary">Edit</button>
                <button class="btn btn-danger" stye>Delete</button>
            </div>
            </article>
                
            <article class="product-w"> 
            <?php $adminModel -> getSpecialOffers(5) ?>
            <div class="text-right">
                <button class="btn btn-secondary">Edit</button>
                <button class="btn btn-danger" stye>Delete</button>
            </div>
            </article>
                
            <article class="product-w"> 
                <?php $adminModel -> getSpecialOffers(17) ?>
                <div class="text-right">
                    <button class="btn btn-secondary">Edit</button>
                    <button class="btn btn-danger" stye>Delete</button>
            </div> 
            </article>
        </div>
    </section>
    </main>

    
<?php
require("./views/shared/footer.php") 
?>
 