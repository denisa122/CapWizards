<?php
require("./views/shared/header.php")
?>

<div style="width:800px; margin:0 auto; padding-top:200px; padding-left:200px;">
    <form method="POST" id="addSpecialOfferForm" action="<?php echo BASE_URL ?>/controllers/AdminController.php?action=addSpecialOffer">
        <label for="productID">Enter ID of the product you want to add to special offers:</label>
        <input type="number" name="productID" class="row input-color input-size-b margin-15 text-center" placeholder="Product ID" required>

        <br />

        <button type="submit" name="addSpecialOffer" class="row text-center form-button-wrapper margin-30 big-button form-button">Add</button>
    </form>
</div>