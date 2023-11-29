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

route('/CapWizards/Products/Category', function () {
    require "views/product/ProductsPageSpecificCategory.php";
});

route('/CapWizards/Products/Category/Subcategory', function () {
    require "views/product/ProductsPageSpecificSubcategory.php";
});

route('/CapWizards/Admin/Products', function () {
    require "views/product/ProductsPageSpecificSubcategoryAdmin.php";
});

route('/CapWizards/Products/Product', function () {
    require "views/product/SingleProduct.php";
});


$action = $_SERVER['REQUEST_URI'];
//echo $action;

dispatch($action);