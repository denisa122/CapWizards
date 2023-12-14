<?php
require("./views/shared/header.php");

require_once "./models/AdminModel.php";
require_once "./models/FooterModel.php";

use models\AdminModel;
use models\FooterModel;

$adminModel = new AdminModel();
$FooterInfoModel = new FooterModel();
?>

<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') { ?>

    <!-- Main -->
    <main>
        <div class="side-padding input-rounded">

            <!-- Company description -->
            <section class="margin-100">
                <h1 class="margin-50 text-center h1-black">Company description</h1>
                <div class="d-flex justify-content-between">
                    <?php $adminModel->getDescription(1); ?>
                </div>
            </section>

            <!-- Extra company details -->
            <section class="margin-100">
                <h1 class="margin-50 text-center h1-black">Other details</h1>
                <div class="d-flex justify-content-between">
                    <?php $adminModel->getExtraCompanyInfo(1); ?>
                </div>
            </section>

            <!-- News -->
            <section class="margin-100">
                <h1 class="margin-50 text-center h1-black">News</h1>
                <a class="btn btn-success" href="http://denisaneagu.com/CapWizards/Admin/Add-news">Add news</a>
                <div class="d-flex justify-content-center">
                    <div>
                        <?php $adminModel->getNews() ?>
                    </div>
                </div>
                </article>
            </section>
        </div>

        <!-- Daily offers -->
        <section class="dailyOffers-section text-center">
            <h1 class="h1-black margin-50">Special offers</h1>
            <a class="btn btn-success" href="http://denisaneagu.com/CapWizards/Admin/Add-special-offer" style="margin-bottom: 80px;">Add special offer</a>
            <div class="d-flex justify-content-center justify-content-between">
                <article class="product-w container">
                    <?php $adminModel->getSpecialOffers(); ?>
                </article>
            </div>
        </section>

        <!-- All products -->
        <section class="dailyOffers-section text-center">
            <h1 class="h1-black margin-50">Edit products</h1>
            <h3>In order to edit all products available on the web shop or add new products, you must go to the products page.</h3>
            <a href="http://denisaneagu.com/CapWizards/Admin/Products">Go to products page.</a>
        </section>
    </main>

<?php } else {
    echo "Page not found";
} ?>


<?php
require("./views/shared/footer.php")
?>