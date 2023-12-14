<?php
require("./views/shared/header.php");

// Get productID from the URL
$productID = isset($_POST['productID']) ? $_POST['productID'] : null;
if ($productID === null) {
  // Handle the case when productID is not provided
  echo "Error: Product ID not provided";
  exit;
}

?>

<div style="width:800px; margin:0 auto; padding-top:200px; padding-left:200px;">
  <form method="POST" id="updateProductForm" action="<?php echo BASE_URL ?>/controllers/AdminController.php?action=updateProduct">
    <!-- Hidden input to pass productID to the updateProduct action -->
    <input type="hidden" name="productID" value="<?php echo $productID; ?>">
    <input type="text" name="productName" class="row input-color input-size-b margin-15 text-center" placeholder="Product name">
    <input type="text" name="productDescription" class="row input-color input-size-b margin-15 text-center" placeholder="Product description">
    <input type="number" name="price" class="row input-color input-size-b margin-15 text-center" placeholder="Price">

    <button type="submit" name="updateProduct" class="row text-center form-button-wrapper margin-30 big-button form-button">Update</button>
  </form>
</div>