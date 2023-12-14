<?php
require("./views/shared/header.php");

// Get companyID from the URL
$companyID = isset($_POST['companyID']) ? $_POST['companyID'] : null;
if ($companyID === null) {
  // Handle the case when companyID is not provided
  echo "Error: Company ID not provided";
  exit;
}
?>

<div style="width:800px; margin:0 auto; padding-top:200px; padding-left:200px;">
  <form method="POST" id="updateCompanyInfoForm" action="<?php echo BASE_URL ?>/controllers/AdminController.php?action=updateExtraInfo">
    <!-- Hidden input to pass companyID to the updateCompanyDescription action -->
    <input type="hidden" name="companyID" value="<?php echo $companyID; ?>">

    <input type="email" name="email" class="row input-color input-size-b margin-15 text-center" placeholder="Email" required>
    <textarea name="openingHours" id='openingHours' required placeholder="Opening hours"></textarea>
    <input type="text" name="phoneNumber" class="row input-color input-size-b margin-15 text-center" placeholder="Phone number" required>

    <button type="submit" name="updateExtraInfo" class="row text-center form-button-wrapper margin-30 big-button form-button">Update</button>
  </form>
</div>