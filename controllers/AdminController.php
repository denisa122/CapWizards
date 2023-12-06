<?php

use models\AdminModel;

require_once __DIR__ . '/../models/AdminModel.php';

$adminModel = new AdminModel();


$action = $_GET["action"];

if ($action == "addNews")
{
    $newsTitle = $_POST["newsTitle"];
    $newsText = $_POST["newsText"];

    $adminModel-> createNews($newsTitle, $newsText);
    
    echo "<script>
    alert('News created successfully');
    window.location.href='http://localhost/CapWizards/Admin';
    </script>";
} else if ($action == "deleteNews")
{
    $newsID = $_GET["newsID"];

    $adminModel -> deleteNews($newsID);

    echo "<script>
    alert('News deleted successfully');
    window.location.href='http://localhost/CapWizards/Admin';
    </script>";
} else if ($action == "updateNews")
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