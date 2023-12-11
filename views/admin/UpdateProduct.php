<?php
require("./views/shared/header.php");

// Get productID from the URL
$productID = isset($_GET['productID']) ? $_GET['productID'] : null;
if ($productID === null) {
    // Handle the case when newsID is not provided
    echo "Error: Product ID not provided";
    exit;
}

?>

<!-- Main -->
<form method="POST" id="updateProductSpecialOfferForm" action="<?php echo BASE_URL ?>/Controllers/AdminController.php?action=updateProductSpecialOffer">
  <!-- Hidden input to pass productID to the updateProductSpecialOffer action -->
  <input type="hidden" name="productID" value="<?php echo $productID; ?>">            
  <input type="text" name="productName" class="row input-color input-size-b margin-15 text-center" placeholder="Product name">
  <input type="text" name="productDescription" class="row input-color input-size-b margin-15 text-center" placeholder="Product description">
  <input type="number" name="price" class="row input-color input-size-b margin-15 text-center" placeholder="Price">
             
  <button type="submit" name="updateProductSpecialOffer" class="row text-center form-button-wrapper margin-30 big-button form-button">Update</button>
</form>