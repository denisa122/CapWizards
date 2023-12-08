<?php
require("./views/shared/header.php");

// Get companyID from the URL
$companyID = isset($_GET['companyID']) ? $_GET['companyID'] : null;
if ($companyID === null) {
    // Handle the case when newsID is not provided
    echo "Error: Company ID not provided";
    exit;
}
?>

<!-- Main -->
<form method="POST" id="updateCompanyDescriptionForm" action="<?php echo BASE_URL ?>/Controllers/AdminController.php?action=updateCompanyDescription">
  <!-- Hidden input to pass companyID to the updateCompanyDescription action -->
  <input type="hidden" name="companyID" value="<?php echo $companyID; ?>">       
            
  <label for="compDescription">New company description</label>
  <textarea name="compDescription" id='compDescription' required></textarea>
             
  <button type="submit" name="updateCompanyDescription" class="row text-center form-button-wrapper margin-30 big-button form-button">Update</button>
</form>