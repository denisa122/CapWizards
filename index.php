<?php 

// modify the BASE_URL value to match your folder
define("BASE_URL", "http://localhost/CapWizards"); 

require_once "router.php";

route('/CapWizards/', function () {
    require "views/Home.php";
});

route('/CapWizards/Login', function () {
    require "views/Login.php";
});

route('/CapWizards/Register', function () {
    require "views/Register.php";
});

$action = $_SERVER['REQUEST_URI'];
//echo $action;

dispatch($action);