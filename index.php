<?php

define("BASE_URL", "http://denisaneagu.com/CapWizards");

require_once "router.php";

route('/CapWizards/', function () {
    require "views/home/Home.php";
});

route('/CapWizards/Login', function () {
    require "views/login/Login.php";
});

route('/CapWizards/Register', function () {
    require "views/login/Register.php";
});

route('/CapWizards/Profile', function () {
    require "views/profile/Profile.php";
});

route('/CapWizards/ShoppingCart', function () {
    require "views/order/CartOverview.php";
});

route('/CapWizards/views/order/CheckOut', function () {
    require "views/order/goToCheckout.php";
});

// Product pages for each category and subcategory

// Alcoholic products

route('/CapWizards/Products/Alcoholic', function () {
    require "views/product/AllAlcoholic.php";
});

route('/CapWizards/Products/Alcoholic/Cider', function () {
    require "views/product/AlcoholicCider.php";
});

route('/CapWizards/Products/Alcoholic/Beer', function () {
    require "views/product/AlcoholicBeer.php";
});

route('/CapWizards/Products/Alcoholic/Shaker', function () {
    require "views/product/AlcoholicShaker.php";
});

route('/CapWizards/Products/Alcoholic/Wine', function () {
    require "views/product/AlcoholicWine.php";
});

// Non-alcoholic products

route('/CapWizards/Products/Non-alcoholic', function () {
    require "views/product/AllNonAlcoholic.php";
});

route('/CapWizards/Products/Non-alcoholic/Soda', function () {
    require "views/product/NonAlcoholicSoda.php";
});

route('/CapWizards/Products/Non-alcoholic/Soft-drink', function () {
    require "views/product/NonAlcoholicSoftDrink.php";
});

route('/CapWizards/Products/Non-alcoholic/Water', function () {
    require "views/product/NonAlcoholicWater.php";
});

//Single page

route('/CapWizards/Products/', function () {
    require "views/product/SingleProduct.php";
});

// Admin related pages

route('/CapWizards/Admin', function () {
    require "views/admin/AdminHome.php";
});

route('/CapWizards/Admin/Add-news', function () {
    require "views/admin/AddNews.php";
});

route('/CapWizards/Admin/Update-news', function () {
    // Extract the newsID from the query parameters
    $newsID = isset($_GET['newsID']) ? $_GET['newsID'] : null;

    require "views/admin/UpdateNews.php";
});

route('/CapWizards/Admin/Update-description', function () {
    // Extract the newsID from the query parameters
    $companyID = isset($_GET['companyID']) ? $_GET['companyID'] : null;

    require "views/admin/UpdateCompanyDescription.php";
});

route('/CapWizards/Admin/Update-extra-info', function () {
    // Extract the newsID from the query parameters
    $companyID = isset($_GET['companyID']) ? $_GET['companyID'] : null;

    require "views/admin/UpdateExtraCompanyInfo.php";
});

route('/CapWizards/Admin/Add-special-offer', function () {
    require "views/admin/AddSpecialOffer.php";
});

route('/CapWizards/Admin/Update-product', function () {
    // Extract the newsID from the query parameters
    $productID = isset($_GET['productID']) ? $_GET['productID'] : null;

    require "views/admin/UpdateProduct.php";
});

// Page where admin can edit products from product page

route('/CapWizards/Admin/Products', function () {
    require "views/admin/allProducts/AllProducts.php";
});

route('/CapWizards/Admin/Add-product', function () {
    require "views/admin/allProducts/AddProduct.php";
});

// Contact form

route('CapWizards/contactForm.php', function () {
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Handle form submission
        $name = $_POST["firstName"];
        $surname = $_POST["lastName"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["Message"];
    }
    include './views/shared/contactForm.php';
});

$action = $_SERVER['REQUEST_URI'];

dispatch($action);
