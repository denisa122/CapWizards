<?php 

// modify the BASE_URL value to match your folder
define("BASE_URL", "http://localhost/CapWizards"); 

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

route('/CapWizards/Admin', function () {
    require "views/admin/AdminHome.php";
});

route('/CapWizards/ShoppingCart', function () {
    require "views/order/CartOverview.php";
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

route('/CapWizards/Products/Alcoholic/Wine', function () {
    require "views/product/SingleProduct.php";
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
//echo $action;

dispatch($action);

// Single page
route('/CapWizards/Products/', function () {
    require "views/product/SingleProduct.php";
});