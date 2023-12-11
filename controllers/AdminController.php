<?php

use models\AdminModel;

require_once __DIR__ . '/../models/AdminModel.php';

$adminModel = new AdminModel();


$action = $_GET["action"];

// CRUD for news
if ($action == "addNews")
{
    $newsTitle = $_POST["newsTitle"];
    $newsText = $_POST["newsText"];

    $adminModel-> createNews($newsTitle, $newsText);
    
    echo "<script>
    alert('News created successfully');
    window.location.href='http://localhost/CapWizards/Admin';
    </script>";
} 
else if ($action == "deleteNews")
{
    $newsID = $_GET["newsID"];

    $adminModel -> deleteNews($newsID);

    echo "<script>
    alert('News deleted successfully');
    window.location.href='http://localhost/CapWizards/Admin';
    </script>";
} 
else if ($action == "updateNews")
{
    $newsID = $_POST["newsID"];
    $newsTitle = $_POST["newsTitle"];
    $newsText = $_POST["newsText"];

    $adminModel -> updateNews($newsID, $newsTitle, $newsText);

    echo "<script>
    alert('News updated successfully');
    window.location.href='http://localhost/CapWizards/Admin';
    </script>";
} 
// Methods for company description
else if ($action == "updateCompanyDescription")
{
    $companyID = $_POST["companyID"];
    $compDescription = $_POST["compDescription"];

    $adminModel -> updateDescription($companyID, $compDescription);

    echo "<script>
    alert('Company description updated successfully');
    window.location.href='http://localhost/CapWizards/Admin';
    </script>";
}
// Methods for extra company details
else if ($action == "updateExtraInfo")
{
    $companyID = $_POST["companyID"];
    $email = $_POST["email"];
    $openingHours = $_POST["openingHours"];
    $phoneNumber = $_POST["phoneNumber"];

    $adminModel -> updateExtraCompanyInfo($companyID, $email, $openingHours, $phoneNumber);

    echo "<script>
    alert('Information updated successfully');
    window.location.href='http://localhost/CapWizards/Admin';
    </script>";
}
// Methods for special offers
else if ($action == "removeProductFromSpecialOffers")
{
    $productID = $_GET['productID'];

    $adminModel -> removeProductFromSpecialOffers($productID);

    echo "<script>
    alert('Product removed from special offers successfully');
    window.location.href='http://localhost/CapWizards/Admin';
    </script>";
}
else if ($action == "addSpecialOffer")
{
    $productID = $_POST["productID"];

    $adminModel-> createSpecialOffer($productID);
    
    echo "<script>
    alert('Special offer created successfully');
    window.location.href='http://localhost/CapWizards/Admin';
    </script>";
}
else if ($action == "updateProductSpecialOffer")
{   
    $productID = $_POST["productID"];
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $price = $_POST['price'];

    $adminModel -> updateProductSpecialOffer($productID, $productName, $productDescription, $price);

    echo "<script>
    alert('Product updated successfully');
    window.location.href='http://localhost/CapWizards/Admin';
    </script>";
}