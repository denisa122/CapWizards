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
// Methods for opening hours
else if ($action = "updateOpeningHours")
{
    $companyID = $_POST["companyID"];
    $openingHours = $_POST["openingHours"];

    $adminModel -> updateOpeningHours($companyID, $openingHours);

    echo "<script>
    alert('Opening hours updated successfully');
    window.location.href='http://localhost/CapWizards/Admin';
    </script>";
}